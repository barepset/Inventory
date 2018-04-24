<div class="add">
<form action="?uac=2" method="post" role="form" id="formgue">
        <div class="form-group">
        <label for="code">Kode Barang</label>
        <input type="text" class="form-control" name="code" id="code" maxlength="10"  placeholder="Kode Barang" style="text-transform:uppercase!important">
      </div>
        <div class="form-group">
          <label for="currdate">Tanggal</label>
          <input type="text" class="form-control" name="currdate" id="currdate" placeholder="Tanggal, cth: yyyy-mm-dd">
        </div>
        <div class="form-group">
          <label for="pic">Penanggung Jawab</label>
          <input type="text" class="form-control" name="pic" id="pic" placeholder="Penanggung Jawab">
        </div>
        <div class="form-group">
          <label for="total">Total</label>
          <input type="text" class="form-control" name="total" id="total" placeholder="Total">
        </div>
        <div class="form-group">
          <label for="description">Deskripsi Barang</label>
          <textarea class="form-control" id="description" name="description" rows="2" placeholder="Deskripsi Barang"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="save">Simpan</button>
    </form>
    <script language ="javascript" type = "text/javascript" >
   $(document).ready(function(){
    var contextroot = "collection_controller.php"
    $("#formgue").submit(function(e){
        e.preventDefault();
        var form = $(this);
        var action = form.attr("action");
        var data = form.serializeArray();

        $.ajax({
                    url: contextroot+action,
                    dataType: 'json',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(getFormData(data)),
                    success: function(data){
                        alert("Sukses BOSSSS!!!");
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
        });
});
});

//utility function
function getFormData(data) {
   var unindexed_array = data;
   var indexed_array = {};

   $.map(unindexed_array, function(n, i) {
    indexed_array[n['name']] = n['value'];
   });

   return indexed_array;
}
    </script>
</div>