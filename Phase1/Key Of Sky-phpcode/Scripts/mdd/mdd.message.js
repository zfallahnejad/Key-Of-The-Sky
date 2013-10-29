
//var mddMsg = {
//    error: function (element, msg) {
//        if (element == "" || element == undefined) {
//            element = "#msgArea";
//        }
//        $(element).html("<p class='error'>" + msg + "<span onclick = 'return mddMsg.fadeOut(this)'>X</span></p>");
//    },
//    success: function (element, msg) {
//        if (element == "" || element == undefined) {
//            element = "#msgArea";
//        }
//        $(element).html("<p class='success'>" + msg + "<span onclick = 'return mddMsg.fadeOut(this)'>X</span></p>");
//    },
//    info: function (element, msg) {
//        if (element == "" || element == undefined) {
//            element = "#msgArea";
//        }
//        $(element).html("<p class='info'>" + msg + "<span onclick = 'return mddMsg.fadeOut(this)'>X</span></p>");
//    },
//    notice: function (element, msg) {
//        if (element == "" || element == undefined) {
//            element = "#msgArea";
//        }
//        $(element).html("<p class='notice'>" + msg + "<span onclick = 'return mddMsg.fadeOut(this)'>X</span></p>");
//    },
//    fadeOut: function (obj) {
//        $(obj.parentElement).slideUp('slow');
//        $(obj).hide('fast');
//    }
//};

var mddMsg = {
    error: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#MessageBox";
        }
        $(element).html("<div class='alert alert-error'><a class='close' data-dismiss='alert' onclick = 'return mddZurbMsg.fadeOut(this)' >x</a><strong>" + msg + "</strong></div>");
    },
    success: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#MessageBox";
        }
        $(element).html("<div class='alert alert-success' ><a class='close' data-dismiss='alert' onclick = 'return mddZurbMsg.fadeOut(this)'>x</a><strong>" + msg + "</strong></div>");
    },
    info: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#MessageBox";
        }
        $(element).html("<div class='alert alert-info'><a class='close' data-dismiss='alert'  href='#' onclick = 'return mddZurbMsg.fadeOut(this)'>x</a><strong>" + msg + "</strong></div>");
    },
    warning: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#MessageBox";
        }
        $(element).html("<div class='alert'><a class='close' data-dismiss='alert'  href='#' onclick = 'return mddZurbMsg.fadeOut(this)'>x</a><strong>" + msg + "</strong></div>");
        //$(element).html("<div class='alert-box warning'>" + msg + "<a href='#' onclick = 'return mddZurbMsg.fadeOut(this)' class='close'>×</a></div>");
    },
    fadeOut: function (obj) {
        $(obj.parentElement).slideUp('slow');
        $(obj).hide('fast');
    }
};


var mddZurbMsg = {
    error: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#msgArea";
        }
        $(element).html("<div class='alert alert-error'><a class='close' data-dismiss='alert' onclick = 'return mddZurbMsg.fadeOut(this)'>x</a><p><strong>" + msg + "</strong></p></div>");
    },
    success: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#msgArea";
        }
        $(element).html("<div class='alert alert-success'><a class='close' data-dismiss='alert' onclick = 'return mddZurbMsg.fadeOut(this)'>x</a><p><strong>" + msg + "</strong></p></div>");
    },
    info: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#msgArea";
        }
        $(element).html("<div class='alert alert-info'><a class='close' data-dismiss='alert' href='#'>x</a><p><strong>" + msg + "</strong></p></div>");
    },
    warning: function (element, msg) {
        if (element == "" || element == undefined) {
            element = "#msgArea";
        }
        $(element).html("<div class='alert alert-block'><a class='close' data-dismiss='alert' href='#' >x</a><p><strong>" + msg + "</strong></p></div>");
        //$(element).html("<div class='alert-box warning'>" + msg + "<a href='#' onclick = 'return mddZurbMsg.fadeOut(this)' class='close'>×</a></div>");
    },
    fadeOut: function (obj) {
        $(obj.parentElement).slideUp('slow');
        $(obj).hide('fast');
    }
};