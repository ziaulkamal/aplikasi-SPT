function luarSelect() {
  location.replace(window.location.href + '/' + 'luar');
}

function lokalSelect() {
  location.replace(window.location.href + '/' + 'lokal');
}

function pendudukBack() {
  location.replace(window.location + '/' + 'penduduk/_tambah');
}
function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
