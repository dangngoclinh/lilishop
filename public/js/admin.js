/*global $:false, jQuery:false */
$(document).ready(function () {
    //install
    var clipboard = new Clipboard('.copy');

    $('[data-toggle="tooltip"]').tooltip();

    //delete_direct
    $('.delete_direct').click(function () {
        return confirm('Bạn có chắc chắn muốn xóa?');
    });

    //menu
    var sidebar_menu = $("#sidebar-menu");
    $('li.active', sidebar_menu).removeClass('active');
    var $url = [location.protocol, '//', location.host, location.pathname].join('');
    var a = $("a[href='" + $url + "']", sidebar_menu);
    var li = a.closest('li');
    li.addClass('active');
    li.closest('li').addClass('active');
    li.parents('li').last().addClass('active');

    //check all
    $('input[name="check_all"]').change(function () {
        var status = $(this).prop('checked');
        $('input[type="checkbox"]', $(this).closest('table')).each(function () {
            $(this).prop('checked', status);
        });
    });


    $(".datetimepicker").datetimepicker({
        format: 'DD-MM-YYYY HH:mm:ss'
    });


    $(".datepicker").datetimepicker({
        format: 'DD-MM-YYYY'
    });
});

function slug(str) {
// Chuyển hết sang chữ thường
    str = str.toLowerCase();

    // xóa dấu
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    // Xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g, '');

    // Xóa khoảng trắng thay bằng ký tự -
    str = str.replace(/(\s+)/g, '-');

    // xóa phần dự - ở đầu
    str = str.replace(/^-+/g, '');

    // xóa phần dư - ở cuối
    str = str.replace(/-+$/g, '');
    return str;
}