<?php //スキンから親テーマの定義済み関数等をオーバーライドして設定の書き換えが可能
if (!defined('ABSPATH')) exit;
/*
///////////////////////////////////////////
// 設定操作サンプル
// lib\page-settings\内のXXXXX-funcs.phpに書かれている
// 定義済み関数をオーバーライドして設定を上書きできます。
// 関数をオーバーライドする場合は必ず!function_existsで
// 存在を確認してください。
///////////////////////////////////////////
//ヘッダーロゴを「トップメニューにするコードサンプル
if ( !function_exists( 'get_header_layout_type' ) ):
function get_header_layout_type(){
    return 'top_menu';
}
endif;

//メインカラム幅を680pxにするサンプル
if ( !function_exists( 'get_main_column_contents_width' ) ):
function get_main_column_contents_width(){
    return 680;
}
endif;

//エントリーカードの枠線を表示するサンプル
if ( !function_exists( 'is_entry_card_border_visible' ) ):
function is_entry_card_border_visible(){
    return true;
}
endif;

*/
function materia_set_color_values()
{

    $properties = [
        'site_key_color',
        'site_key_text_color',
        'site_background_color',
    ];

    $css = ':root {';

    foreach ($properties as $property) {
        $value = get_theme_option($property);
        if(empty($value)) continue;
        $css .= '--' . str_replace('_', '-', $property) . ': ' . $value . ';';
    }

    $css .= '}';

    wp_add_inline_style(THEME_NAME . '-skin-style', $css);
}

add_action('wp_enqueue_scripts', 'materia_set_color_values');
