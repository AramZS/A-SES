<?php
vc_map( array(
   "name" => __("Bar tag test"),
   "base" => "bartag",
   "class" => "",
   "category" => __('Content'),
//   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
//   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "param_name" => "fug",
         "value" => __("Default params value"),
         "description" => __("Description for foo param.")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text"),
         "param_name" => "foo",
         "value" => __("Default params value"),
         "description" => __("Description for foo param.")
      ),
//      array(
//         "type" => "colorpicker",
//         "holder" => "div",
//         "class" => "",
//         "heading" => __("Text color"),
//         "param_name" => "color",
//         "value" => '#FF0000', //Default Red color
//         "description" => __("Choose text color")
//      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content"),
         "param_name" => "content",
         "value" => __("<p>I am test text block. Click edit button to change this text.</p>"),
         "description" => __("Enter your content.")
      )
   )
) );
?>