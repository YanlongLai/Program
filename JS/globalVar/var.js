// 定義三個全局變量
var global_var = 1;
global_novar = 2; // 反面教材
(function () {
    global_fromfunc = 3; // 反面教材
    }());

    // 試圖刪除
    delete global_var; // false
    delete global_novar; // true
    delete global_fromfunc; // true

    // 測試該刪除
    typeof global_var; // "number"
    typeof global_novar; // "undefined"
    typeof global_fromfunc; // "undefined"
