<?php
/*
Plugin Name: WP Virtual Keyboard
Plugin URI: 
Description: Virtual Keyboard For Wordpress Website!
Version: 1.0
Author: Arnab Mondal
*/

function CVK_VirtKey_options_page()
{
?>
  <div class="wrap">
    <h2>Virtual Keyboard Settings</h2>
    <p>You can choose language for your virtual keyboard.</p>
    <?php
    if (isset($_POST["CVK_virtkeyboard_layout"])) {
      $CVK_virtKeyBoard_layout_safe = sanitize_text_field($_POST["CVK_virtkeyboard_layout"]);

      if ($CVK_virtKeyBoard_layout_safe) {
        // set language layout
        update_option('CVK_virtkeyboard_layout', $CVK_virtKeyBoard_layout_safe);
        echo '<div class="updated"><p>Updated successfully.</p></div>';
      }
    }
    ?>
    <form method="post">
      <fieldset class="options">
        <legend>Language:</legend><br>
        <?php
        $CVK_virtkeyboard_layout = get_option('CVK_virtkeyboard_layout');
        ?>
        <select name="CVK_virtkeyboard_layout" class="bulk-action-selector-top">
          <option value="ar" <?php if ($CVK_virtkeyboard_layout == 'ar') {
                                echo (' selected="selected"');
                              } ?>>Arabic</option>
          <option value="cn" <?php if ($CVK_virtkeyboard_layout == 'cn') {
                                echo (' selected="selected"');
                              } ?>>Chinese</option>
          <option value="en" <?php if ($CVK_virtkeyboard_layout == 'en' or $CVK_virtkeyboard_layout == '') {
                                echo (' selected="selected"');
                              } ?>>English</option>
          <option value="fr" <?php if ($CVK_virtkeyboard_layout == 'fr') {
                                echo (' selected="selected"');
                              } ?>>French</option>
          <option value="ge" <?php if ($CVK_virtkeyboard_layout == 'ge') {
                                echo (' selected="selected"');
                              } ?>>German</option>
          <option value="gr" <?php if ($CVK_virtkeyboard_layout == 'gr') {
                                echo (' selected="selected"');
                              } ?>>Greek</option>
          <option value="hb" <?php if ($CVK_virtkeyboard_layout == 'hb') {
                                echo (' selected="selected"');
                              } ?>>Hebrew</option>
          <option value="jp" <?php if ($CVK_virtkeyboard_layout == 'jp') {
                                echo (' selected="selected"');
                              } ?>>Japanese</option>
          <option value="ko" <?php if ($CVK_virtkeyboard_layout == 'ko') {
                                echo (' selected="selected"');
                              } ?>>Korean</option>
          <option value="ku" <?php if ($CVK_virtkeyboard_layout == 'ku') {
                                echo (' selected="selected"');
                              } ?>>Kurdish</option>
          <option value="ru" <?php if ($CVK_virtkeyboard_layout == 'ru') {
                                echo (' selected="selected"');
                              } ?>>Russian</option>
          <option value="sp" <?php if ($CVK_virtkeyboard_layout == 'sp') {
                                echo (' selected="selected"');
                              } ?>>Spanish</option>
          <option value="ta" <?php if ($CVK_virtkeyboard_layout == 'ta') {
                                echo (' selected="selected"');
                              } ?>>Tamil</option>
          <option value="th" <?php if ($CVK_virtkeyboard_layout == 'th') {
                                echo (' selected="selected"');
                              } ?>>Thai</option>
          <option value="ur" <?php if ($CVK_virtkeyboard_layout == 'ur') {
                                echo (' selected="selected"');
                              } ?>>Urdu</option>
        </select>
        <input type="submit" value="Change it" class="button action" />
      </fieldset>
    </form>
  </div>
<?php
}

function CVK_VirtKey_add_menu()
{
  add_options_page('Virtual Keyboard', 'Virtual Keyboard', 'manage_options', 'virutal-keyboard.php', 'CVK_VirtKey_options_page');
}
function CVK_register_virtual_keyboard_styles()
{
  wp_register_style('virtual-keyboard-plugin', plugins_url('virtual-keyboard/css/virt-keyboard-style.css'));
  wp_enqueue_style('virtual-keyboard-plugin');
}

function CVK_register_virtual_keyboard_scripts()
{
  wp_enqueue_script(
    'custom-script',
    plugins_url('virtual-keyboard/js/virtual-keyboard.js'),
    array('jquery')
  );
}

function CVK_add_virtual_keyboard_html()
{
  $CVK_virtkeyboard_layout = get_option('CVK_virtkeyboard_layout');
  $CVK_optional1 = "";
  $CVK_optional2 = "";
  $CVK_optional3 = "";
  $CVK_additionals_url = "";
  $CVK_additionals_text = "";

  switch ($CVK_virtkeyboard_layout) { // case '' - return english layout
    case "ar":
      echo '<script> var CVK_langStringArray = {
    name: "Arabic", keys: [
      ["\u0630", "\u0651", ""], ["1", "!", "\u00a1", "\u00b9"], ["2", "@", "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00a4"], ["5", "%", "\u20ac"], ["6", "^", "\u00bc"], ["7", "&", "\u00bd"], ["8", "*", "\u00be"], ["9", "(", "\u2018"], ["0", ")", "\u2019"], ["-", "_", "\u00a5"], ["=", "+", "\u00d7"],
      ["\u0040", "\u0040", "\u0040"], ["\u0636", "\u064e", ""], ["\u0635", "\u064b", ""], ["\u062b", "\u064f", ""], ["\u0642", "\u064c", ""], ["\u0641", "\u0644", ""], ["\u063a", "\u0625", ""], ["\u0639", "\u2018", ""], ["\u0647", "\u00f7", ""], ["\u062e", "\u00d7", ""], ["\u062d", "\u061b", ""], ["\u062c", "<", ""], ["\u062f", ">", ""], ["\u005C", "|", ""], ["", "\u00a3", ""],
      ["\u0634", "\u0650", ""], ["\u0633", "\u064d", ""], ["\u064a", "]", ""], ["\u0628", "[", ""], ["\u0644", "\u0644", ""], ["\u0627", "\u0623", ""], ["\u062a", "\u0640", ""], ["\u0646", "\u060c", ""], ["\u0645", "\u002F", ""], ["\u0643", ":", ""], ["\u0637", "", ""], ["", "", ""],
      ["\u0626", "~", ""], ["\u0621", "\u0652", ""], ["\u0624", "}", ""], ["\u0631", "{", ""], ["\u0644", "\u0644", ""], ["\u0649", "\u0622", ""], ["\u0629", "\u2019", ""], ["\u0648", ",", ""], ["\u0632", ".", ""], ["\u0638", "\u061f", ""], ["", "", ""]
    ]};</script>';
      $CVK_additionals_text = "Arabic";

      break;
    case "cn":
      echo '<script> var CVK_langStringArray = {
    name: "Chinese", keys: [
      ["\u2018", "~", "\u00B0"], ["1", "!", "\u00B1"], ["2", "@", "\u00BC"], ["3", "#", "\u00BD"], ["4", "$", "\u00BE"], ["5", "%", "\u00A4"], ["6", "^", "\u00AC"], ["7", "&", "\u00B2"], ["8", "*", "\u00B3"], ["9", ")", "\u00A2"], ["0", "(", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"],
      ["\u0040", "\u0040", "\u0040"], ["\u624B", "q", "\u007E"], ["\u7530", "w", "\u00A7"], ["\u6C34", "e", "\u00B6"], ["\u53E3", "r", ":"], ["\u5EFF", "t", ";"], ["\u535C", "y", ""], ["\u5C71", "u", "\u0027"], ["\u6208", "i", "\u0022"], ["\u4EBA", "o", "\u00AB"], ["\u5FC3", "p", "\u00BB"], ["[", "{", "\u005B"], ["]", "}", "\u005D"], ["\u005C", "|", "\u007B"], ["\u002F", "", "\u007D"],
      ["\u65E5", "a", "\u00B5"], ["\u5C38", "s", ""], ["\u6728", "d", ""], ["\u706B", "f", ""], ["\u571F", "g", "\u02BB"], ["\u7AF9", "h", "\u02BC"], ["\u5341", "j", "„"], ["\u5927", "k", "\u201E"], ["\u4E2D", "l", "\u201C"], [";", ":", ""], ["", "", "!"], ["", "", "?"],
      ["\uFF3A", "z", ""], ["\u96E3", "x", ""], ["\u91D1", "c", ""], ["\u5973", "v", ""], ["\u6708", "b", "\u003C"], ["\u5F13", "n", "\u003E"], ["\u4E00", "m", "\u005F"], [",", "<", "\u035F"], [".", ">", "\u005C"], ["", "?", "\u007C"], ["", "", "\u002F"], ["", ""]
    ]};</script>';
      $CVK_additionals_text = "Chinese";
      break;
    case "en":
      echo '<script> var CVK_langStringArray = {
    name: "English", keys: [ 
      ["\u2018", "\u007E", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "%", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "*", "\u00B3"], ["9", "(", "\u00A2"], ["0", ")", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"], 
      ["\u0040", "\u0040", "\u0040"], ["q", "Q", "\u007E"], ["w", "W", "\u00A7"], ["e", "E", "\u00B6"], ["r", "R", ":"], ["t", "T", ";"], ["y", "Y", ""], ["u", "U", "\u0027"], ["i", "I", "\u0022"], ["o", "O", "\u00AB"], ["p", "P", "\u00BB"], ["\u005B", "\u007B", "\u005B"], ["\u005D", "\u007D", "\u005D"], ["\u005C", "\u007C", "\u007B"], ["\u201C", "\u201F", "\u007D"], 
      ["a", "A", "\u00B5"], ["s", "S", ""], ["d", "D", ""], ["f", "F", ""], ["g", "G", "\u02BB"], ["h", "H", "\u02BC"], ["j", "J", "„"], ["k", "K", "\u201E"], ["l", "L", "\u201C"], [";", ":", ""], ["\u0027", "\u0022", "!"], ["!", "?", "?"],
      ["z", "Z", ""], ["x", "X", ""], ["c", "C", ""], ["v", "V", ""], ["b", "B", "\u003C"], ["n", "N", "\u003E"], ["m", "M", "\u005F"], [",", "\u003C", "\u035F"], [".", "\u003E", "\u005C"], [":", ";", "\u007C"], ["\u002F", "\u005F", "\u002F"]
      ]};</script>';
      $CVK_additionals_text = "English";

      break;
    case "fr":
      echo '<script> var CVK_langStringArray = {
    name: "French", keys: [
     ["\u2018", "\u007E", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "%", "\u00A4"], ["6", "?", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "*", "\u00B3"], ["9", "(", "\u00A2"], ["0", ")", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u00B5"], 
      ["\u0040", "\u0040", "\u0040"], ["q", "Q", "\u007E"], ["w", "W", "\u00A7"], ["e", "E", "\u00B6", "\u00EA", "\u00CA", "\u00EB", "\u00CB", "\u00E8", "\u00C8"], ["r", "R", ":"], ["t", "T", ";"], ["y", "Y", "", "", "", "\u00FF", "\u0178"], ["u", "U", "\u0027", "\u00FB", "\u00DB", "\u00FC", "\u00DC", "\u00F9", "\u00D9"], ["i", "I", "\u0022", "\u00EE", "\u00CE", "\u00EF", "\u00CF"], ["o", "O", "\u00AB", "\u00F4", "\u00D4"], ["p", "P", "\u00BB"], ["\u005E", "\u005E", "\u005B", "\u005E", "\u005E", "\u005E", "\u005E", "\u005E", "\u005E"], ["\u00A8", "\u00A8", "\u005D", "\u00A8", "\u00A8", "\u00A8", "\u00A8", "\u00A8", "\u00A8"], ["\u00E9", "\u00C9", "\u007B"], ["!", "?", "\u007D"], 
      ["a", "A", "", "\u00E2", "\u00C2", "", "", "\u00E0", "\u00C0"], ["s", "S", ""], ["d", "D", ""], ["f", "F", ""], ["g", "G", "\u02BB"], ["h", "H", "\u02BC"], ["j", "J", "„"], ["k", "K", "\u201E"], ["l", "L", "\u201C"], [";", ":", ""], ["\u0060", "\u0060", "!", "\u0060", "\u0060", "\u0060", "\u0060", "\u0060", "\u0060"], ["\u0027", "\u0022", "?"],
       ["z", "Z", ""], ["x", "X", ""], ["c", "C", ""], ["v", "V", ""], ["b", "B", "\u003C"], ["n", "N", "\u003E"], ["m", "M", "\u005F"], [",", "\u003C", "\u035F"], [".", "\u003E", "\u005C"], ["\u00E7", "\u00C7", "\u007C"], ["\u0153", "\u0152", "\u002F"]
    ]};</script>';
      $CVK_optional1 = "CVK_optional-button1";
      $CVK_optional2 = "CVK_optional-button2";
      $CVK_optional3 = "CVK_optional-button3";
      $CVK_additionals_text = "French";
      break;
    case "ge":
      echo '<script> var CVK_langStringArray = {
    name: "Germany", keys: [ 
        ["\u0027", "\u007E", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "\u0025", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "\u002A", "\u00B3"], ["9", "\u0028", "\u00A2"], ["0", "\u0029", "\u20AC"], ["-", "\u005F", "\u00A3"], ["=", "+", "\u00B5"],
        ["\u0040", "\u0040", "\u0040"], ["q", "Q", "\u007E"], ["w", "W", "\u00A7"], ["e", "E", "\u00B6"], ["r", "R", ":"], ["t", "T", ";"], ["y", "Y", ""], ["u", "U", "\u0027"], ["i", "I", "\u0022"], ["o", "O", "\u00AB"], ["p", "P", "\u00BB"], ["\u00FC", "\u00DC", "\u005B"], ["\u00E4", "\u00C4", "\u005D"], ["\u002F", "\u005C", "\u007B"], ["\u00AB", "\u00BB", "\u007D"],
        ["a", "A", ""], ["s", "S", ""], ["d", "D", ""], ["f", "F", ""], ["g", "G", "\u02BB"], ["h", "H", "\u02BC"], ["j", "J", "\u201E"], ["k", "K", "\u201C"], ["l", "L", "\u201D"], [";", ":", ""], ["\u00F6", "\u00D6", "!"], ["!", "?", "?"],
        ["z", "Z", ""], ["x", "X", ""], ["c", "C", ""], ["v", "V", ""], ["b", "B", "\u003C"], ["n", "N", "\u003E"], ["m", "M", "\u005F"], [",", "\u003C", "\u035F"], [".", "\u003E", "\u005C"], ["\u00DF", ";", "\u007C"], ["sch", "Sch", "\u002F"]
        ]};</script>';
      $CVK_additionals_text = "Germany";
      break;
    case "gr":
      echo '<script> var CVK_langStringArray = {
    name: "Greek", keys: [
      ["`", "~", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "\u0025", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "\u002A", "\u00B3"], ["9", "\u0028", "\u00A2"], ["0", "\u0029", "\u20AC"], ["-", "\u005F", "\u00A3"], ["=", "+", "\u00B5"],
        ["\u0040", "\u0040", "\u0040"], [";", ":", "\u007E"], ["\u03c2", "", "\u00A7"], ["\u03b5", "\u0395", "\u00B6", "", "", "", "", "\u03AD", "\u0388"], ["\u03c1", "\u03a1", ":"], ["\u03c4", "\u03a4", ";"], ["\u03c5", "\u03a5", "", "\u03B0", "", "", "\u03D4", "\u03CD", "\u038E"], ["\u03b8", "\u0398"], ["\u03b9", "\u0399", "", "\u0390", "", "", "", "\u03AF", "\u038A"], ["\u03bf", "\u039f", "", "", "", "\u03CA", "\u03AA", "\u03CC", "\u038C"], ["\u03c0", "\u03a0"], ["\u0385", "\u0385", "\u005B", "\u0385", "\u0385", "\u0385", "\u0385", "\u0385", "\u0385"], ["\u00A8", "\u00A8", "\u005D", "\u00A8", "\u00A8", "\u00A8", "\u00A8", "\u00A8", "\u00A8"], ["[", "{", "\u201c"], ["]", "}", "\u201d"], 
      ["\u03b1", "\u0391", "", "", "", "", "", "\u03AC", "\u0386"], ["\u03c3", "\u03a3"], ["\u03b4", "\u0394"], ["\u03c6", "\u03a6"], ["\u03b3", "\u0393"], ["\u03b7", "\u0397", "", "", "", "", "", "\u03AE", "\u0389"], ["\u03be", "\u039e"], ["\u03ba", "\u039a"], ["\u03bb", "\u039b"], ["", "", ""], ["\u0060", "\u0060", "!", "\u0060", "\u0060", "\u0060", "\u0060", "\u0060", "\u0060"], ["\u0027", "\u0022", "?"],
      ["\u03b6", "\u0396"], ["\u03c7", "\u03a7"], ["\u03c8", "\u03a8"], ["\u03c9", "\u03a9", "", "", "", "", "", "\u03CE", "\u038F"], ["\u03b2", "\u0392"], ["\u03bd", "\u039d"], ["\u03bc", "\u039c"], [",", "<"], [".", ">"], ["\u002F", "?"], ["", ""]
    ]};</script>';
      $CVK_optional1 = "CVK_optional-button1";
      $CVK_optional2 = "CVK_optional-button2";
      $CVK_optional3 = "CVK_optional-button3";
      $CVK_additionals_text = "Greek";
      break;
    case "hb":
      echo '<script> var CVK_langStringArray = {
    name: "Hebrew", keys: [
      ["\u2018", "\u007E", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "%", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "*", "\u00B3"], ["9", "(", "\u00A2"], ["0", ")", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"], 
      ["\u0040", "\u0040", "\u0040"], ["\u002F", "Q"], ["\u0027", "W"], ["\u05e7", "E", "\u20ac"], ["\u05e8", "R"], ["\u05d0", "T"], ["\u05d8", "Y"], ["\u05d5", "U", "\u05f0"], ["\u05df", "I"], ["\u05dd", "O"], ["\u05e4", "P"], ["\u005C", "\u007C"], ["]", "}"], ["[", "{"], [],
      ["\u05e9", "A"], ["\u05d3", "S"], ["\u05d2", "D"], ["\u05db", "F"], ["\u05e2", "G"], ["\u05d9", "H", "\u05f2"], ["\u05d7", "J", "\u05f1"], ["\u05dc", "K"], ["\u05da", "L"], ["\u05e3", ":"], [",", "\u0022"], [""],
      ["\u05d6", "Z"], ["\u05e1", "X"], ["\u05d1", "C"], ["\u05d4", "V"], ["\u05e0", "B"], ["\u05de", "N"], ["\u05e6", "M"], ["\u05ea", ">"], ["\u05e5", "<"], [".", "?"], [], [], []
      ]};</script>';
      $CVK_additionals_text = "Hebrew";

      break;
    case "jp":
      echo '<script> var CVK_langStringArray = {
    name: "Japanese", keys: [
      ["\uff5e"], ["\u306c", "\u30cc"], ["\u3075", "\u30d5"], ["\u3042", "\u30a2", "\u3041", "\u30a1"], ["\u3046", "\u30a6", "\u3045", "\u30a5"], ["\u3048", "\u30a8", "\u3047", "\u30a7"], ["\u304a", "\u30aa", "\u3049", "\u30a9"], ["\u3084", "\u30e4", "\u3083", "\u30e3"], ["\u3086", "\u30e6", "\u3085", "\u30e5"], ["\u3088", "\u30e8", "\u3087", "\u30e7"], ["\u308f", "\u30ef", "\u3092", "\u30f2"], ["\u307b", "\u30db", "\u30fc", "\uff1d"], ["\u3078", "\u30d8" , "\uff3e", "\uff5e"],
      ["\u305f", "\u30bf"], ["\u3066", "\u30c6"], ["\u3044", "\u30a4", "\u3043", "\u30a3"], ["\u3059", "\u30b9"], ["\u304b", "\u30ab"], ["\u3093", "\u30f3"], ["\u306a", "\u30ca"], ["\u306b", "\u30cb"], ["\u3089", "\u30e9"], ["\u305b", "\u30bb"], ["\u3001", "\u3001", "\uff20", "\u2018"], ["\u3002", "\u3002", "\u300c", "\uff5b"], ["\uffe5", "", "", "\uff0a"], ["\u309B", "", "\uffe5", "\uff5c"],
      ["\u3061", "\u30c1"], ["\u3068", "\u30c8"], ["\u3057", "\u30b7"], ["\u306f", "\u30cf"], ["\u304d", "\u30ad"], ["\u304f", "\u30af"], ["\u307e", "\u30de"], ["\u306e", "\u30ce"], ["\u308c", "\u30ec", "\uff1b", "\uff0b"], ["\u3051", "\u30b1", "\uff1a", "\u30f6"], ["\u3080", "\u30e0", "\u300d", "\uff5d"],
      ["\u3064", "\u30c4"], ["\u3055", "\u30b5"], ["\u305d", "\u30bd"], ["\u3072", "\u30d2"], ["\u3053", "\u30b3"], ["\u307f", "\u30df"], ["\u3082", "\u30e2"], ["\u306d", "\u30cd", "\u3001", "\uff1c"], ["\u308b", "\u30eb", "\u3002", "\uff1e"], ["\u3081", "\u30e1", "\u30fb", "\uff1f"], ["\u308d", "\u30ed", "", "\uff3f"], [], [], [], []
    ]};</script>';
      $CVK_additionals_text = "Japanese";

      break;
    case "ko":
      echo '<script> var CVK_langStringArray = {
    name: "Korean", keys: [
      ["`", "~", "`", "~"], ["1", "!", "1", "!"], ["2", "@", "2", "@"], ["3", "#", "3", "#"], ["4", "$", "4", "$"], ["5", "%", "5", "%"], ["6", "^", "6", "^"], ["7", "&", "7", "&"], ["8", "*", "8", "*"], ["9", ")", "9", ")"], ["0", "(", "0", "("], ["-", "_", "-", "_"], ["=", "+", "=", "+"], ["\u20A9", "|", "\u20A9", "|"],
      ["\u1107", "\u1108", "q", "Q"], ["\u110C", "\u110D", "w", "W"], ["\u1103", "\u1104", "e", "E"], ["\u1100", "\u1101", "r", "R"], ["\u1109", "\u110A", "t", "T"], ["\u116D", "", "y", "Y"], ["\u1167", "", "u", "U"], ["\u1163", "", "i", "I"], ["\u1162", "\u1164", "o", "O"], ["\u1166", "\u1168", "p", "P"], ["[", "{", "[", "{"], ["]", "}", "]", "}"], ["\u005C"], [],
      ["\u1106", "", "a", "A"], ["\u1102", "", "s", "S"], ["\u110B", "", "d", "D"], ["\u1105", "", "f", "F"], ["\u1112", "", "g", "G"], ["\u1169", "", "h", "H"], ["\u1165", "", "j", "J"], ["\u1161", "", "k", "K"], ["\u1175", "", "l", "L"], [";", ":", ";", ":"], ["\u0027", "", ""], [],
      ["\u110F", "", "z", "Z"], ["\u1110", "", "x", "X"], ["\u110E", "", "c", "C"], ["\u1111", "", "v", "V"], ["\u1172", "", "b", "B"], ["\u116E", "", "n", "N"], ["\u1173", "", "m", "M"], [",", "<", ",", "<"], [".", ">", ".", ">"], ["\u002F", "?", "\u002F", "?"], [], [], [], []
    ]};</script>';
      $CVK_additionals_text = "Korean";

      break;
    case "ku":
      echo '<script> var CVK_langStringArray = {
    name: "Kurdish", keys: [
      ["\u20ac", "~"], ["\u0661", "!"], ["\u0662", "@"], ["\u0663", "#"], ["\u0664", "$"], ["\u0665", "%"], ["\u0666", "^"], ["\u0667", "&"], ["\u0668", "*"], ["\u0669", "("], ["\u0660", ")"], ["-", "_"], ["=", "+"],
      ["\u0040", "\u0040", "\u0040"], ["\u0642", "`"], ["\u0648", "\u0648\u0648"], ["\u06d5", "\u064a"], ["\u0631", "\u0695"], ["\u062a", "\u0637"], ["\u06cc", "\u06ce"], ["\u0626", "\u0621"], ["\u062d", "\u0639"], ["\u06c6", "\u0624"], ["\u067e", "\u062b"], ["[", "{"], ["]", "}"], ["\u005C", "|"], [],
      ["\u0627", "\u0622"], ["\u0633", "\u0634"], ["\u062f", "\u0630"], ["\u0641", "\u0625"], ["\u06af", "\u063a"], ["\u0647", "\u200c"], ["\u0698", "\u0623"], ["\u06a9", "\u0643"], ["\u0644", "\u06b5"], ["\u061b", ":"], ["\u0027"], [],
      ["\u0632", "\u0636"], ["\u062e", "\u0635"], ["\u062c", "\u0686"], ["\u06a4", "\u0638"], ["\u0628", "\u0649"], ["\u0646", "\u0629"], ["\u0645", "\u0640"], ["\u060c", "<"], [".", ">"], ["\u002F", "\u061f"], [], [], [], []
    ]};</script>';
      $CVK_additionals_text = "Kurdish";

      break;
    case "ru":
      echo '<script> var CVK_langStringArray = {
    name: "Russian", keys: [
      ["\u0451", "\u0401", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u2116", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "%", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "*", "\u00B3"], ["9", "(", "\u00A2"], ["0", ")", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"], 
      ["\u0040", "\u0040", "\u0040"], ["\u0439", "\u0419", "\u007E"], ["\u0446", "\u0426", "\u00A7"], ["\u0443", "\u0423", "\u00B6"], ["\u043A", "\u041A", ":"], ["\u0435", "\u0415", ";"], ["\u043D", "\u041D", ""], ["\u0433", "\u0413", "\u0027"], ["\u0448", "\u0428", "\u0022"], ["\u0449", "\u0429", "\u00AB"], ["\u0437", "\u0417", "\u00BB"], ["\u0445", "\u0425", "\u005B"], ["\u044A", "\u042A", "\u005D"], ["\u005C", "\u002F", "\u007B"], ["\u00AB", "\u00BB", "\u007D"], 
      ["\u0444", "\u0424", "\u00B5"], ["\u044B", "\u042B", ""], ["\u0432", "\u0412", ""], ["\u0430", "\u0410", ""], ["\u043F", "\u041F", "\u02BB"], ["\u0440", "\u0420", "\u02BC"], ["\u043E", "\u041E", "„"], ["\u043B", "\u041B", "\u201E"], ["\u0434", "\u0414", "\u201C"], ["\u0436", "\u0416", ""], ["\u044D", "\u042D", "!"], ["!", "?", "?"],
      ["\u044F", "\u042F", ""], ["\u0447", "\u0427", ""], ["\u0441", "\u0421", ""], ["\u043C", "\u041C", ""], ["\u0438", "\u0418", "\u003C"], ["\u0442", "\u0422", "\u003E"], ["\u044C", "\u042C", "\u005F"], ["\u0431", "\u0411", "\u035F"], ["\u044E", "\u042E", "\u005C"], [",", ";", "\u007C"], [".", ":", "\u002F"]
      ]};</script>';
      $CVK_additionals_text = "Russian";

      break;
    case "sp":
      echo '<script> var CVK_langStringArray = {
    name: "Spanish", keys: [
      ["\u2018", "\u007E", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "%", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "*", "\u00B3"], ["9", "(", "\u00A2"], ["0", ")", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"], 
      ["\u0040", "\u0040", "\u0040"], ["q", "Q", "\u007E"], ["w", "W", "\u00A7"], ["e", "E", "\u00B6", "", "", "\u00E9", "\u00C9"], ["r", "R", ":"], ["t", "T", ";"], ["y", "Y", ""], ["u", "U", "\u0027", "", "", "\u00FA", "\u00DA"], ["i", "I", "\u0022", "", "", "\u00ED", "\u00CD"], ["o", "O", "\u00AB", "", "", "\u00F3", "\u00D3"], ["p", "P", "\u00BB"], ["\u00FC", "\u00DC", "\u005B"],  ["\u00B4", "\u00B4", "\u005D", "\u00B4", "\u00B4", "\u00B4", "\u00B4", "\u00B4", "\u00B4"], ["\u005C", "\u002F", "\u007B"], ["\u201C", "\u201D", "\u007D"],
      ["a", "A","\u00B5", "", "", "\u00E1", "\u00C1"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G", "\u02BB"], ["h", "H", "\u02BC"], ["j", "J", "„"], ["k", "K", "\u201E"], ["l", "L", "\u201C"], [";", ":"], ["\u00f1", "\u00d1", "!"], ["-", "\u007C", "?"],
      ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B", "\u003C"], ["n", "N", "\u003E"], ["m", "M", "\u005F"], [",", "\u003C", "\u035F"], [".", "\u003E", "\u005C"], ["?", "\u00BF", "\u007C"], ["!", "\u00A1", "\u002F"], []
    ]};</script>';
      $CVK_optional2 = "CVK_optional-button2";
      $CVK_additionals_text = "Spanish";

      break;
    case "ta":
      echo '<script> var CVK_langStringArray = {
    name: "Tamil", keys: [
      ["\u0BCA", "\u0B92"], ["1", "", "\u0BE7"], ["2", "", "\u0BE8"], ["3", "", "\u0BE9"], ["4", "", "\u0BEA"], ["5", "", "\u0BEB"], ["6", "\u0BA4\u0BCD\u0BB0", "\u0BEC"], ["7", "\u0B95\u0BCD\u0BB7", "\u0BED"], ["8", "\u0BB7\u0BCD\u0BB0", "\u0BEE"], ["9", "", "\u0BEF"], ["0", "", "\u0BF0"], ["-", "\u0B83", "\u0BF1"], ["", "", "\u0BF2"],
     ["\u0040", "\u0040", "\u0040"], ["\u0BCC", "\u0B94"], ["\u0BC8", "\u0B90"], ["\u0BBE", "\u0B86"], ["\u0BC0", "\u0B88"], ["\u0BC2", "\u0B8A"], ["\u0BAA", "\u0BAA"], ["\u0BB9", "\u0B99"], ["\u0B95", "\u0B95"], ["\u0BA4", "\u0BA4"], ["\u0B9C", "\u0B9A"], ["\u0B9F", "\u0B9F"], ["\u0B9E"], [], [],
      ["\u0BCB", "\u0B93"], ["\u0BC7", "\u0B8F"], ["\u0BCD", "\u0B85"], ["\u0BBF", "\u0B87"], ["\u0BC1", "\u0B89"], ["\u0BAA", "\u0BAA"], ["\u0BB0", "\u0BB1"], ["\u0B95", "\u0B95"], ["\u0BA4", "\u0BA4"], ["\u0B9A", "\u0B9A"], ["\u0B9F", "\u0B9F"], [],
      ["\u0BC6", "\u0B8E"], [""], ["\u0BAE", "\u0BA3"], ["\u0BA8", "\u0BA9"], ["\u0BB5", "\u0BB4"], ["\u0BB2", "\u0BB3"], ["\u0BB8", "\u0BB7"], [",", "\u0BB7"], [".", "\u0BB8\u0BCD\u0BB0\u0BC0"], ["\u0BAF", "\u0BAF"], [], []
      ]};</script>';
      $CVK_additionals_text = "Tamil";

      break;
    case "th":
      echo '<script> var CVK_langStringArray = {
    name: "Thai", keys: [
      ["_", "%", "\u00B0"], ["\u0E45", "+", "\u00B1"], ["\u002F", "\u0E51", "\u00BC"], ["-", "\u0E52", "\u00BD"], ["\u0E20", "\u0E53", "\u00BE"], ["\u0E16", "\u0E54", "\u00A4"], ["\u0E38", "\u0E39", "\u00AC"], ["\u0E36", "\u0E3F", "\u00B2"], ["\u0E04", "\u0E55", "\u00B3"], ["\u0E15", "\u0E56", "\u00A2"], ["\u0E08", "\u0E57", "\u20AC"], ["\u0E02", "\u0E58", "\u00A3"], ["\u0E0A", "\u0E59", "\u20BD"],
      ["\u0040", "\u0040", "\u0040"], ["\u0E46", "\u0E50", "\u007E"], ["\u0E44", "\u0022", "\u00A7"], ["\u0E33", "\u0E0E", "\u00B6"], ["\u0E1E", "\u0E11", ":"], ["\u0E30", "\u0E18", ";"], ["\u0E31", "\u0E4D"], ["\u0E35", "\u0E4A", "\u0027"], ["\u0E23", "\u0E13", "\u0022"], ["\u0E19", "\u0E2F", "\u00AB"], ["\u0E22", "\u0E0D", "\u00BB"], ["\u0E1A", "\u0E10", "\u005B"], ["\u0E25", ",", "\u005D"], ["\u0E03", "\u0E05", "\u007B"], [],
      ["\u0E1F", "\u0E24","\u00B5"], ["\u0E2B", "\u0E06"], ["\u0E01", "\u0E0F"], ["\u0E14", "\u0E42"], ["\u0E40", "\u0E0C", "\u02BB"], ["\u0E49", "\u0E47", "\u02BC"], ["\u0E48", "\u0E4B", "„"], ["\u0E32", "\u0E29", "\u201E"], ["\u0E2A", "\u0E28", "\u201C"], ["\u0E27", "\u0E0B"], ["\u0E07", ".", "!"], ["","","?"],
      ["\u0E1C", "("], ["\u0E1B", ")"], ["\u0E41", "\u0E09"], ["\u0E2D", "\u0E2E"], ["\u0E34", "\u0E3A", "\u003C"], ["\u0E37", "\u0E4C", "\u003E"], ["\u0E17", "?", "\u005F"], ["\u0E21", "\u0E12", "\u035F"], ["\u0E43", "\u0E2C", "\u005C"], ["\u0E1D", "\u0E26", "\u007C"], ["", "", "\u002F"], [], [], [], []
    ]};</script>';
      $CVK_additionals_text = "Thai";

      break;
    case "ur":
      echo '<script> var CVK_langStringArray = {
    name: "Urdu", keys: [
      ["`", "~", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "#", "\u00BD"], ["4", "$", "\u00BE"], ["5", "\u066A", "\u00A4"], ["6", "^", "\u00AC"], ["7", "\u06D6", "\u00B2"], ["8", "\u066D", "\u00B3"], ["9", ")", "\u00A2"], ["0", "(", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"],
       ["\u0040", "\u0040", "\u0040"], ["\u0637", "\u0638", "\u007E"], ["\u0635", "\u0636", "\u00A7"], ["\u06be", "\u0630", "\u00B6"], ["\u062f", "\u0688", ":"], ["\u0679", "\u062B", ";"], ["\u067e", "\u0651"], ["\u062a", "\u06C3", "\u0027"], ["\u0628", "\u0640", "\u0022"], ["\u062c", "\u0686", "\u00AB"], ["\u062d", "\u062E", "\u00BB"], ["]", "}", "\u005B"], ["[", "{", "\u005D"], ["", "", "\u007B"], ["", "", "\u007D"],
       ["\u0645", "\u0698","\u00B5"], ["\u0648", "\u0632"], ["\u0631", "\u0691"], ["\u0646", "\u06BA"], ["\u0644", "\u06C2", "\u02BB"], ["\u06c1", "\u0621", "\u02BC"], ["\u0627", "\u0622", "„"], ["\u06A9", "\u06AF", "\u201E"], ["\u06CC", "\u064A", "\u201C"], ["\u061b", ":"], ["\u0027", "", "!"], ["", "", "?"],
      ["\u0642", "\u200D"], ["\u0641", "\u200C"], ["\u06D2", "\u06D3"], ["\u0633", "\u200E"], ["\u0634", "\u0624", "\u003C"], ["\u063a", "\u0626", "\u003E"], ["\u0639", "\u200F", "\u005F"], ["\u060C", ">", "\u035F"], ["\u06D4", "<", "\u005C"], ["\u002F", "\u061F", "\u007C"], ["", "", "\u002F"], [], [], []
    ]};</script>';
      $CVK_additionals_text = "Urdu";

      break;
    default:
      echo '<script> var CVK_langStringArray = {
    name: "English", keys: [ 
          ["\u2018", "\u007E", "\u00B0"], ["1", "!", "\u00B1"], ["2", "\u0040", "\u00BC"], ["3", "\u0023", "\u00BD"], ["4", "\u0024", "\u00BE"], ["5", "%", "\u00A4"], ["6", "\u005E", "\u00AC"], ["7", "\u0026", "\u00B2"], ["8", "*", "\u00B3"], ["9", "(", "\u00A2"], ["0", ")", "\u20AC"], ["-", "_", "\u00A3"], ["=", "+", "\u20BD"], 
      ["\u0040", "\u0040", "\u0040"], ["q", "Q", "\u007E"], ["w", "W", "\u00A7"], ["e", "E", "\u00B6"], ["r", "R", ":"], ["t", "T", ";"], ["y", "Y", ""], ["u", "U", "\u0027"], ["i", "I", "\u0022"], ["o", "O", "\u00AB"], ["p", "P", "\u00BB"], ["\u005B", "\u007B", "\u005B"], ["\u005D", "\u007D", "\u005D"], ["\u005C", "\u007C", "\u007B"], ["\u201C", "\u201F", "\u007D"], 
      ["a", "A","\u00B5"], ["s", "S", ""], ["d", "D", ""], ["f", "F", ""], ["g", "G", "\u02BB"], ["h", "H", "\u02BC"], ["j", "J", "„"], ["k", "K", "\u201E"], ["l", "L", "\u201C"], [";", ":", ""], ["\u0027", "\u0022", "!"], ["!", "?", "?"],
      ["z", "Z", ""], ["x", "X", ""], ["c", "C", ""], ["v", "V", ""], ["b", "B", "\u003C"], ["n", "N", "\u003E"], ["m", "M", "\u005F"], [",", "\u003C", "\u035F"], [".", "\u003E", "\u005C"], [":", ";", "\u007C"], ["\u002F", "\u005F", "\u002F"]
      ]};</script>';
      $CVK_additionals_text = "English";
  }
  echo '  
	<!-- Cool Virtual Keyboard PqlBpDd8QCue5qGtak17zsF2lyttgk -->
      <div class="CVK_keyboard_popup">
        <div class="CVK_keyboard_popup_close_button" title="close"></div>
        <div class="CVK_virtual_keyboard">
            <div class="CVK_virt_keyboard_line">
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="0"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="1"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="2"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="3"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="4"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="5"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="6"></span>                
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="7"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="8"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="9"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="10"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="11"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="12"></span>
                <span class="CVK_keyboard_button CVK_backspace_button" data-main="-1">backspace</span>
            </div>
            <div class="CVK_virt_keyboard_line">
                <span class="CVK_keyboard_button CVK_extra_button1" data-main="13"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="14"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="15"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="16"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="17"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="18"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="19"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="20"></span>                
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="21"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="22"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="23"></span>
                <span class="CVK_keyboard_button ';
  if ($CVK_optional1 != "") {
    echo $CVK_optional1;
  } else {
    echo 'CVK_main_buttons';
  }
  echo '" data-main="24"></span>            
                <span class="CVK_keyboard_button ';
  if ($CVK_optional2 != "") {
    echo $CVK_optional2;
  } else {
    echo 'CVK_main_buttons';
  }
  echo '" data-main="25"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="26"></span>
                <span class="CVK_keyboard_button CVK_extra_button2" data-main="27"></span>              
            </div>
            <div class="CVK_virt_keyboard_line">
                <span class="CVK_keyboard_button CVK_capslock_button" data-main="-1">caps lock</span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="28"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="29"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="30"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="31"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="32"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="33"></span>                
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="34"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="35"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="36"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="37"></span>            
                <span class="CVK_keyboard_button ';
  if ($CVK_optional3 != "") {
    echo $CVK_optional3;
  } else {
    echo 'CVK_main_buttons';
  }
  echo '" data-main="38"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="39"></span>
                <span class="CVK_keyboard_button CVK_enter_button" data-main="-1">enter</span>
            </div>
            <div class="CVK_virt_keyboard_line">
                <span class="CVK_keyboard_button CVK_shift_button" data-main="-1">shift</span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="40"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="41"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="42"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="43"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="44"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="45"></span>                
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="46"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="47"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="48"></span>
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="49"></span>            
                <span class="CVK_keyboard_button CVK_main_buttons" data-main="50"></span>            
                <span class="CVK_keyboard_button CVK_shift_button" data-main="-1">shift</span>
            </div>
            <div class="CVK_virt_keyboard_line">
                <span class="CVK_keyboard_button CVK_space_button">&nbsp;</span>
                <span class="CVK_keyboard_button CVK_additions_button">&laquo; &raquo; { } ~</span>
            </div>
        </div>
    </div>
    <svg id="CVK_keyboardSVG" width="0" height="0">
    <defs>
      <path id="CVK_path_keyboard" d="M0,140.621v243.911h525.153V140.621H0z M375.922,175.062h22.975h22.954v45.907h-22.954h-22.975V175.062z M387.409,243.922    v45.907h-22.975H341.48v-45.907h22.954C364.434,243.922,387.409,243.922,387.409,243.922z M307.039,175.062h22.975h22.975v45.907    h-22.975h-22.975V175.062z M318.549,243.922v45.907h-22.975H272.62v-45.907h22.954    C295.573,243.922,318.549,243.922,318.549,243.922z M238.2,175.062h22.954h22.932v45.907h-22.932H238.2V175.062z M249.644,243.922    v45.907h-22.932h-22.975v-45.907h22.975C226.713,243.922,249.644,243.922,249.644,243.922z M169.296,175.062h22.975h22.954v45.907    h-22.954h-22.975C169.296,220.969,169.296,175.062,169.296,175.062z M180.806,243.922v45.907H157.83h-22.954v-45.907h22.954    C157.83,243.922,180.806,243.922,180.806,243.922z M100.457,175.062h22.932h22.975v45.907h-22.975h-22.932V175.062z     M31.553,220.969v-45.907h22.954h22.975v45.907H54.506H31.553z M66.016,289.829v-45.907H88.97h22.975v45.907H88.97    C88.97,289.829,66.016,289.829,66.016,289.829z M433.316,361.578h-34.419h-34.441h-34.419h-34.441h-34.419h-34.419h-34.485H157.83    h-34.441H88.948v-45.907h34.419h34.441h34.441h34.441h34.419h34.419h34.441h34.419h34.441h34.419v45.907H433.316z     M456.292,289.829h-22.975h-22.954v-45.907h22.954h22.975V289.829z M490.711,220.969h-22.954h-22.975v-45.907h22.975h22.954    V220.969z"/>
    </defs>
    </svg>';
}


add_action('admin_menu', 'CVK_VirtKey_add_menu');
add_action('wp_enqueue_scripts', 'CVK_register_virtual_keyboard_styles');
add_action('wp_enqueue_scripts', 'CVK_register_virtual_keyboard_scripts');
add_action('wp_footer', 'CVK_add_virtual_keyboard_html');

?>