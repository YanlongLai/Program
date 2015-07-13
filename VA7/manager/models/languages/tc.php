<?php
/*

UserFrosting Version: 0.2.2
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

/*
%m1% - Dymamic markers which are replaced at run time by the relevant index.
*/

$lang = array();

// Installer
$lang = array_merge($lang,array(
    "INSTALLER_INCOMPLETE"      => "你不能註冊管理者帳號除非安裝已經完成!",
    "MASTER_ACCOUNT_EXISTS"     => "管理帳號已經存在",
    "MASTER_ACCOUNT_NOT_EXISTS" => "你不能註冊帳號除非管理帳號已經建立!",
    "CONFIG_TOKEN_MISMATCH" => "對不起，你的設定的Token不正確"
    ));

//Account
$lang = array_merge($lang,array(
	"ACCOUNT_SPECIFY_USERNAME" 		=> "請輸入您的使用者名稱",
	"ACCOUNT_SPECIFY_PASSWORD" 		=> "請輸入您的使用者密碼",
	"ACCOUNT_SPECIFY_EMAIL"			=> "請輸入您的使用者信箱",
	"ACCOUNT_INVALID_EMAIL"			=> "不合法的使用者信箱",
    "ACCOUNT_INVALID_USER_ID"		=> "您的使用者帳號不存在",
    "ACCOUNT_INVALID_PAY_TYPE"		=> "不合法的付款方式，付款方式必須為'deduct fee' or 'hourly'.",
	"ACCOUNT_USER_OR_EMAIL_INVALID"		=> "使用者帳號或信箱不正確",
	"ACCOUNT_USER_OR_PASS_INVALID"		=> "使用者帳號或密碼不正確",
	"ACCOUNT_ALREADY_ACTIVE"		=> "您的使用者帳號已經被啟動",
	"ACCOUNT_REGISTRATION_DISABLED" => "我們感到很抱歉，帳號註冊系統已經被關閉",
    "ACCOUNT_INACTIVE"			=> "您的帳號目前並未被啟用，請檢查您的信箱或是垃圾夾之中是否有認證的信件",
	"ACCOUNT_DISABLED"			=> "這個帳號已經被關閉，如果想要得到更多的資訊請洽詢我們",
    "ACCOUNT_USER_CHAR_LIMIT"		=> "您的使用者帳號長度必須介於 %m1% ~ %m2% 字元長度之間",
	"ACCOUNT_DISPLAY_CHAR_LIMIT"		=> "您的帳號顯示名稱長度必須介於 %m1% ~ %m2%字元長度之間",
	"ACCOUNT_PASS_CHAR_LIMIT"		=> "您的密碼長度必須介於%m1% ~ %m2%字元長度之間",
	"ACCOUNT_TITLE_CHAR_LIMIT"		=> "標題的長度必須介於%m1% ~ %m2%字元長度之間",
	"ACCOUNT_PASS_MISMATCH"			=> "您的密碼和確認密碼必須相同",
	"ACCOUNT_DISPLAY_INVALID_CHARACTERS"	=> "顯示名稱只能包括字母 數字 字元",
	"ACCOUNT_USERNAME_IN_USE"		=> "用戶名%m1%已經在使用",
	"ACCOUNT_DISPLAYNAME_IN_USE"		=> "顯示名稱%m1%已經在使用",
	"ACCOUNT_EMAIL_IN_USE"			=> "電子郵件%m1%已經在使用",
	"ACCOUNT_LINK_ALREADY_SENT"		=> "認證郵件已發送到該郵箱地址，在過去%m1%小時",
	"ACCOUNT_NEW_ACTIVATION_SENT"		=> "我們已經通過電子郵件發送你一個新的認證連結，請檢查您的電子郵件",
	"ACCOUNT_SPECIFY_NEW_PASSWORD"		=> "請輸入您的新密碼",	
	"ACCOUNT_SPECIFY_CONFIRM_PASSWORD"	=> "請確認您的新密碼",
	"ACCOUNT_NEW_PASSWORD_LENGTH"		=> "新的密碼字元長度必須介於%m1%與%m2%",	
	"ACCOUNT_PASSWORD_INVALID"		=> "當前密碼並沒有一個與我們的密碼相符合",	
	"ACCOUNT_DETAILS_UPDATED"		=> "帳戶詳細信息更新",
	"ACCOUNT_ACTIVATION_MESSAGE"		=> "您需要請動您的帳戶，然後才能登錄。請按照以下連結啟動您的帳號。 \n\n
	%m1%activate_user.php?token=%m2%",							
	"ACCOUNT_CREATION_COMPLETE"		=> "新使用者%m1%已經被建立",
    "ACCOUNT_ACTIVATION_COMPLETE"		=> "您已經成功的啟動您的帳號，您已經可以登入系統",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE1"	=> "您已經成功註冊，您可以現在登入",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE2"	=> "您已經成功註冊，將會馬上收到認證信件，您必須啟動您的帳號再登入之前",
	"ACCOUNT_PASSWORD_NOTHING_TO_UPDATE"	=> "您不能更新相同的密碼",
	"ACCOUNT_PASSWORD_UPDATED"		=> "帳號的密碼已經被更新",
	"ACCOUNT_EMAIL_UPDATED"			=> "帳號的信箱已經被更新",
	"ACCOUNT_TOKEN_NOT_FOUND"		=> "Token不存在 / 帳號已經被啟動",
	"ACCOUNT_USER_INVALID_CHARACTERS"	=> "使用者暱稱只能使用字母以及數字",
    "ACCOUNT_DELETE_MASTER"     => "您不能刪除主帳號!",
    "ACCOUNT_DISABLE_MASTER"     => "您不能關閉主帳號!",
    "ACCOUNT_DISABLE_SUCCESSFUL"     => "帳號已經成功被關閉",
    "ACCOUNT_ENABLE_SUCCESSFUL"     => "帳號已經成功被開啟",
    "ACCOUNT_DELETIONS_SUCCESSFUL"		=> "您已經成功刪除%m1%使用者",
	"ACCOUNT_MANUALLY_ACTIVATED"		=> "%m1%的帳號已經被手動開啟",
	"ACCOUNT_DISPLAYNAME_UPDATED"		=> "使用者暱稱被改成%m1%",
	"ACCOUNT_TITLE_UPDATED"			=> "%m1%的標題被改成%m2%",
	"ACCOUNT_GROUP_ADDED"		=> "增加使用者到群組%m1%.",
	"ACCOUNT_GROUP_REMOVED"		=> "移除使用者從群組%m1%.",
	"ACCOUNT_GROUP_NOT_MEMBER"		=> "使用者非此群組%m1%.",
	"ACCOUNT_GROUP_ALREADY_MEMBER"		=> "使用者已經是此群組%m1%.",
    "ACCOUNT_INVALID_USERNAME"		=> "不正確的使用者名稱",
    "ACCOUNT_PRIMARY_GROUP_SET" => "成功地設定使用者的主群組",
	));

//Configuration
$lang = array_merge($lang,array(
	"CONFIG_NAME_CHAR_LIMIT"		=> "網站名稱必須介於 %m1% ~ %m2%字元長度",
	"CONFIG_URL_CHAR_LIMIT"			=> "網站網址必須介於 %m1% ~ %m2%字元長度",
	"CONFIG_EMAIL_CHAR_LIMIT"		=> "網站信箱必須介於 %m1% ~ %m2%字元長度",
	"CONFIG_TITLE_CHAR_LIMIT"		=> "新的使用者標題必須介於 %m1% ~ %m2%字元長度",
    "CONFIG_ACTIVATION_TRUE_FALSE"		=> "信箱認證必須啟動或不啟動",
	"CONFIG_REGISTRATION_TRUE_FALSE"		=> "使用者註冊必須啟動或不啟動",
    "CONFIG_ACTIVATION_RESEND_RANGE"	=> "啟用的緩衝必須介於 %m1% ~ %m2% 小時",
	"CONFIG_LANGUAGE_CHAR_LIMIT"		=> "語言路徑必須介於 %m1% ~ %m2% 字元長度",
	"CONFIG_LANGUAGE_INVALID"		=> "不存在這個語言特徵的檔案`%m1%`",
	"CONFIG_TEMPLATE_CHAR_LIMIT"		=> "模板路徑必須介於 %m1% ~ %m2% 字元長度",
	"CONFIG_TEMPLATE_INVALID"		=> "沒有此 template key `%m1%` 的檔案",
	"CONFIG_EMAIL_INVALID"			=> "您想登入的這個信箱已經無效",
	"CONFIG_INVALID_URL_END"		=> "請加入/在您的網站網址最後面",
	"CONFIG_UPDATE_SUCCESSFUL"		=> "您的網站設定已經更新，你也許需要重新讀取新頁面才能得到效果",
	));

//Forgot Password
$lang = array_merge($lang,array(
	"FORGOTPASS_INVALID_TOKEN"		=> "您的token已經無效",
    "FORGOTPASS_OLD_TOKEN"          => "Token已經過期",
    "FORGOTPASS_COULD_NOT_UPDATE"   => "不能更新密碼",
	"FORGOTPASS_NEW_PASS_EMAIL"		=> "我們已經寄給您新的密碼",
	"FORGOTPASS_REQUEST_CANNED"		=> "忘記密碼的需求已經取消",
	"FORGOTPASS_REQUEST_EXISTS"		=> "已經傳送遺失密碼的需求給這個帳戶",
	"FORGOTPASS_REQUEST_SUCCESS"		=> "我們已經通過電子郵件發送您如何恢復您的帳戶登入權限",
	));

//Mail
$lang = array_merge($lang,array(
	"MAIL_ERROR"				=> "傳送信箱嚴重錯誤，請聯絡您的網站管理者",
	"MAIL_TEMPLATE_BUILD_ERROR"		=> "建立信箱的模板失敗!",
	"MAIL_TEMPLATE_DIRECTORY_ERROR"		=> "不能打開信箱模板的資料夾，請嘗試設定信箱資料夾 %m1%",
	"MAIL_TEMPLATE_FILE_EMPTY"		=> "模板檔案是空的...沒有可以傳送的檔案",
	));

//Miscellaneous
$lang = array_merge($lang,array(
    "PASSWORD_HASH_FAILED"  => "密碼雜湊失敗，請洽詢網站管理員",
	"NO_DATA"				=> "沒有資料 / 錯誤資料傳送",
    "CAPTCHA_FAIL"				=> "安全問題錯誤",
	"CONFIRM"				=> "確認",
	"DENY"					=> "拒絕",
	"SUCCESS"				=> "成功",
	"ERROR"					=> "錯誤",
	"NOTHING_TO_UPDATE"			=> "無任何更新",
	"SQL_ERROR"				=> "嚴重的資料庫錯誤",
	"FEATURE_DISABLED"			=> "這個功能已經被關閉",
	"PAGE_INVALID_ID"              => "這個需求網頁編號已經不存在",
	"PAGE_INVALID"              => "這個需求網頁已經在資料庫找不到了",    
    "PAGE_PRIVATE_TOGGLED"			=> "這個頁面目前是 %m1%",
	"PAGE_ACCESS_REMOVED"			=> "頁面已經被移除對於等級是 %m1% 的帳戶",
	"PAGE_ACCESS_ADDED"			=> "頁面已經被新增對於等級是 %m1% 的帳戶",
    "ACCESS_DENIED" => "呵呵，似乎您沒有權限可以這麼做!",
    "LOGIN_REQUIRED" => "對不起，您必須登入才能使用這項資源!",
	));

//Permissions
$lang = array_merge($lang,array(
    "GROUP_INVALID_ID"              => "這個要求的群組編號是不存在的",
	"PERMISSION_CHAR_LIMIT"			=> "權限名稱必須限定介於 %m1% ~ %m2% 字元長度",
	"PERMISSION_NAME_IN_USE"		=> "權限名稱 %m1% 已經被使用",
	"PERMISSION_DELETION_SUCCESSFUL_NAME"		=> "成功刪除權限 '%m1%'",
    "PERMISSION_DELETIONS_SUCCESSFUL"	=> "成功刪除權限等級 %m1% ",
	"PERMISSION_CREATION_SUCCESSFUL"	=> "成功建立權限等級 `%m1%`",
	"GROUP_UPDATE"		=> "群組 `%m1%` 成功被更新",
	"PERMISSION_REMOVE_PAGES"		=> "成功移除進入 %m1% 頁面",
	"PERMISSION_ADD_PAGES"			=> "成功加入進入 %m1% 頁面",
	"PERMISSION_REMOVE_USERS"		=> "成功移除使用者權限 %m1% ",
	"PERMISSION_ADD_USERS"			=> "成功加入使用者權限 %m1% ",
	"CANNOT_DELETE_PERMISSION_GROUP" => "您不能刪除這群組 '%m1%'",
	));

//Private Messages
$lang = array_merge($lang,array(
    "PM_RECEIVER_DELETION_SUCCESSFUL"   => "訊息被刪除",
));
?>
