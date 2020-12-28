function swapStyleSheet(sheet){
    document.getElementById('sidebarstyle').setAttribute('href', "css/"+ sheet + ".css");
    document.getElementById('selectedtheme').setAttribute('value', sheet);
}

//collapse sidebar. That's not my code
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
});



