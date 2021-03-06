<button class="export btn btn-success" onclick="myFunction()" style="float:right">export</button>
<script type="text/javascript">
function myFunction(){
      $("#table").table2excel({
        filename:"excel.xls",
        name:"worksheet"
      })
}
</script>
