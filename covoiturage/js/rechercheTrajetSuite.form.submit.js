  function sendvalue() {
    var date=document.getElementById("datepicker").value;
    document.getElementById("dateSend").value=date;
    document.forms['info'].submit();
  }