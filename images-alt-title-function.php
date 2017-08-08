function lnb_alt_title_tags($content)
{
        global $post;
        preg_match_all('/<img (.*?)\/>/', $content, $images);
        if(!is_null($images))
        {
                foreach($images[1] as $index => $value)
                {
                        if(preg_match('/alt=""/', $value) || !preg_match('/alt=/', $value))
                        {
                                $new_img = str_replace('<img', '<img title="'.$post->post_title.'" alt="'.$post->post_title.'"', $images[0][$index]);
                                $content = str_replace($images[0][$index], $new_img, $content);
                        } 
                        else if (preg_match('/title=""/', $value) || !preg_match('/title=/', $value))
                        {
                                $new_img = str_replace('<img', '<img title="'.$post->post_title.'"', $images[0][$index]);
                                $content = str_replace($images[0][$index], $new_img, $content);
                        }                                                         
                }
        }
        return $content;
}
add_filter('the_content', 'lnb_alt_title_tags', 99999);