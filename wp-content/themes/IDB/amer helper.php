 <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            $p = idb_posted_footer();
                            echo '<div class="article">';
                            ?>

                            <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                            <p class="infopost"><a href="#" class="com">

                                    <span><?php echo strip_tags($p); ?></span>

                                </a> Posted on <span class="date">

                                    <?php the_time('F j, Y g:i a'); ?> |
                                    by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"></a>
                                    <a href="#"><?php the_author(); ?></a> 

                                    &nbsp;&nbsp;&bull;&nbsp;&nbsp; Filed under <a href="#">templates</a>,

                                    <a href="#">internet</a></p>
                            <div class="clr"></div>
                            <?php
                            $categories = get_the_category();
                            $output = '';
                            $i = 1;

                            foreach ($categories as $category) {
                                if ($i > 1) {
                                    $output .= ", ";
                                }
                                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr('View all posts inits', $category->name) . '">' . $category->cat_name . '</a>';
                                $i++;
                            }

                            echo "  Category:  " . $output;
                            ?>
                            <div class="img">
                                <?php if (has_post_thumbnail()) { ?>      
                                    <a href="<?php the_permalink(); ?> " class="post-image"><?php the_post_thumbnail(); ?></a>
                                <?php } ?>
                            </div>

                            <div class="post_content">
                                <p><?php the_excerpt(); ?></p>
                                <p class="spec"><a href="<?php the_permalink(); ?>" class="rm"><?php _e('Read More'); ?> &raquo;</a></p>
                            </div>
                            <div class="clr"></div>
                            <?php
                            echo '</div>';
                        }
                    }
                    ?>


                    <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>

                </div>        
                <?php
                ?>