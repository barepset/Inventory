CREATE DATABASE pbcsopendistb

use pbcsopendistb

-- Create Database
CREATE TABLE collection (
	code char(10) NOT NULL,
	currdate datetime NOT NULL,
	pic varchar(50) NOT NULL,
	total numeric(19, 2) DEFAULT 0,
	description varchar(255),
	PRIMARY KEY (code)
);
-- Inserting data into Database
INSERT INTO collection VALUES ('CL18030001','2018-03-16','Titi','18500','Gas');
INSERT INTO collection VALUES ('CL18030002','2018-03-16','Bambang','27300','Padat');
INSERT INTO collection VALUES ('CL18030003','2018-03-16','Bambang','22200','Padat');
INSERT INTO collection VALUES ('CL18030004','2018-03-16','Priambodo','92000','Cair');
INSERT INTO collection VALUES ('CL18030005','2018-03-16','Priambodo','19000','Cair');
INSERT INTO collection VALUES ('CL18030006','2018-03-16','Bambang','10000','Padat');
INSERT INTO collection VALUES ('CL18030007','2018-03-16','Priambodo','11000','Padat');
INSERT INTO collection VALUES ('CL18030008','2018-03-16','Titi','14000','Gas');
INSERT INTO collection VALUES ('CL18030009','2018-03-16','Titi','32000','Gas');
INSERT INTO collection VALUES ('CL18030010','2018-03-16','Priambodo','45000','Padat');

-- Template
SELECT * FROM collection;

-- VIEW
CREATE VIEW vwCOLLECTION AS
SELECT	code, currdate, pic, total as collection from collection;
SELECT * from vwCOLLECTION;

-- PROCEDURE
CREATE PROCEDURE fncollectionadd(@code char(10), @currdate datetime, @pic varchar(50), @total numeric(19, 2), @description varchar(255))
AS BEGIN
	IF EXISTS(SELECT code FROM collection WHERE code = @code) BEGIN
		UPDATE collection SET currdate = @currdate, pic = @pic, total = @total, description = @description WHERE code = @code
	END ELSE BEGIN
		INSERT INTO collection VALUES(@code, @currdate, @pic, @total, @description)
	END
END;

CREATE PROCEDURE fncollectionsub(@code char(10)) 
AS BEGIN
	IF EXISTS(SELECT code FROM collection WHERE code = @code) BEGIN
		DELETE FROM collection WHERE code = @code
	END
END;

EXECUTE fncollectionadd 'CL18030001','2018-03-16','Titi','18500','Gas';

-- FUNCTION
CREATE FUNCTION fncollectiongen(@code int) RETURNS varchar(10)
AS BEGIN
	DECLARE @_code int
	DECLARE @_result varchar(10)
	IF @_result IS NULL BEGIN
		SET @_result = '1'
	END ELSE BEGIN
		SET @_code = CONVERT(int, @_result) + 1
		SET @_result = CONVERT(varchar(10), @_code)
	END
	RETURN REPLACE(STR(@_result, 10), SPACE(1), '0')
END;

SELECT dbo.fncollectiongen ('11') as code;
