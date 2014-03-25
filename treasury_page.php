<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                var htmlStr = $("#preview").html();
                var regX = /\n/gi ;
                htmlStr = htmlStr.replace(regX, "");
                $("#source").text(htmlStr);

            });

        </script>
        <title>Etsy treasury HTML code generator</title>
    </head>
    <body>
        <h1>
            Etsy treasury HTML code generator
        </h1>
        <h2>
            by <a href="http://www.whalesharkwebsites.com">Whale Shark Websites</a>
        </h2>
        <h3>
            Description
        </h3>
        <p>This is a tool that lets you insert treasuries into your blog or webpage to promote them.
            You enter an Etsy treasury ID and the tool generates a chunk of HTML that will display the treasury items.
            This approach is better than just taking a screen shot because the links will be automatically created for you.
        </p>
        <ul>
            <li>The treasury title links to the Etsy treasury page</li>
            <li>The name of the curator links to their Etsy page</li>
            <li>The photo and the title of each item links to the Etsy listing page</li>
            <li>The name of the seller for each item links to the seller's Etsy shop</li>
        </ul>
        <p>
            NOTE: The term 'Etsy' is a trademark of Etsy, Inc.  This application uses the Etsy API but is not endorsed or certified by Etsy, Inc.
        </p>
        <h3>
            Instructions
        </h3>
        <ol>
            <li>
                Go to the Etsy page for the treasury you want to insert. Look at the URL in your browser's address bar - it should look something like this:<br/><br/>
                <i>http://www.etsy.com/treasury/<b>4c78082f71896d91a0f03ff5</b>/let-them-eat-cake</i><br/><br/>
                The treasury ID is the bit in bold - the long string of letters and numbers.<br/><br/>
            </li>
            <li>
                Paste this ID into the form below, and choose how many columns you want to split the
                treasury into. The default is 4 columns, which is the same as on Etsy, but you can make
                the treasury thinner or wider to suit the design of the website you're putting it on.<br/><br/>
            </li>
            <li>
                Hit the "generate code" button and wait. It may take a while to work, as the tool
                has to retrieve a lot of information from Etsy.<br/><br/>
            </li>
            <li>
                Take a look at the preview to check that everything looks okay. If it looks good, scroll down to
                the "HTML code" section.<br/><br/>
            </li>
            <li>
                Copy all the code from the text box and paste it into the web page where you want to display
                the treasury. If you're using WordPress, BlogSpot or any kind of software with a built-in editor,
                make sure you are working in HTML mode and not "visual editor" or "wysiwyg" mode.<br/><br/>
            </li>
            <li>
                If it doesn't look right, <a href="http://www.whalesharkwebsites.com/contact-us/">contact me via my blog</a> or at martin@whalesharkwebsites.com and I'll take a look.
            </li>

        </ol>
        <hr/>
        <form name="form1" method="post" action="">
            <p>Treasury Id:
                <input type="text" name="treasury_id" value="<?php echo $treasury_id; ?>" size="20">
            </p>
            <p>Columns
                <select name="columns" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4" selected="true">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </p>

            <p>Size
                <select name="size" >
                    <option value="tiny">tiny</option>
                    <option value="small">small</option>
                    <option value="normal" selected="true">normal</option>
                    <option value="large">large</option>
                </select>
            </p>

            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="Generate code" />
            </p>
        </form>
        <hr />
	<pre>
         <?php //print_r($result) ?>
         <?php echo  $size;  ?>
        </pre>
        <h2>
            Preview
        </h2>
        <?php if ($result != null) {
        ?>

            <div id="preview">
                <h2 style="
                    font-size:16px;
                    font-family:sans-serif;
                    margin-left: 10px;
                    "
                    >
                    <a style="
                       color:#333333;
                       text-decoration: none;
                       "
                       onmouseover="this.style.textDecoration='underline'"
                       onmouseout="this.style.textDecoration='none'"
                       href="http://www.etsy.com/treasury/<?php echo $result->id ?>">
                       <?php echo("'$result->title'") ?>
                </a>
                by
                <a style="
                   color:#333333;
                   text-decoration: none;
                   "
                   onmouseover="this.style.textDecoration='underline'"
                   onmouseout="this.style.textDecoration='none'"
                   href="http://www.etsy.com/shop/<?php echo $result->user_name ?>">
                       <?php echo $result->user_name ?>
                </a>
            </h2>
            <h2 style="
                font-size:16px;
                font-family:sans-serif;
                margin-left: 10px;
                ">
                    <?php echo("$result->description<br/>"); ?>
               </h2>

               <table style="
                      border-spacing: 8px;
                      width:auto;
                      border-collapse: separate;
                      line-height:19px;
                      ">
                   <tr>
                    <?php
                       for ($offset = 0; $offset < 16; $offset+=$columns) {
                    ?>

                    <?php
                           foreach (array_slice($result->listings, $offset, $columns) as $listing) {

                               /*
                               $url = "http://openapi.etsy.com/v2/sandbox/public/listings/:listing_id/images/" . $listing->data->image_id . "?api_key=aag634vs4adchdvkwhc5d5v4";
                               $ch = curl_init($url);
                               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                               $response_body = curl_exec($ch);
                               $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                               if (intval($status) != 200)
                                   echo("Error: $response_body");
                               $response = json_decode($response_body);
                               $image = $response->results;

                                */
                    ?>

                               <td style="
                                   border:1px solid #ECECEC;
                                   padding: 6px;
                                   text-align:left;

                                   "
					<?php if ($size == 'tiny') echo "width=110px;" ?>
					<?php if ($size == 'small') echo "width=150px;" ?>
					<?php if ($size == 'normal') echo "width=180px;" ?>
					<?php if ($size == 'large') echo "width=210px;" ?>
                                   >
                                   <a style="
                                      text-decoration: none;
                                      "
                                      href="http://www.etsy.com/listing/<?php echo $listing->data->listing_id ?>"
                                      onmouseover="this.style.textDecoration='underline'"
                                      onmouseout="this.style.textDecoration='none'"
                                      >
                                       <img style="
                                            border:none;
						<?php if ($size == 'tiny') echo "width:100px;" ?>
						<?php if ($size == 'small') echo "width:140px;" ?>
						<?php if ($size == 'normal') echo "width:170px;" ?>
						<?php if ($size == 'large') echo "width:200px;" ?>
                                            "
                                            src="<?php 
                                            echo $listing->data->image_url_170x135
                                            //echo "http://ny-image". rand(0,3) . ".etsy.com/il_170x135." . $listing->data->image_id . ".jpg"
                                                    ?>"/>
                                       <br/>
                                   </a>
                                   <a style="
                                      text-decoration: none;
                                      "
                                      href="http://www.etsy.com/listing/<?php echo $listing->data->listing_id ?>"
                                      onmouseover="this.style.textDecoration='underline'"
                                      onmouseout="this.style.textDecoration='none'"
                                      >
                                       <span style="
                                             color:#666666;
						<?php if ($size == 'tiny') echo "font-size:8px;" ?>
						<?php if ($size == 'small') echo "font-size:9px;" ?>
						<?php if ($size == 'normal') echo "font-size:10px;" ?>
						<?php if ($size == 'large') echo "font-size:11px;" ?>
                                             font-family:sans-serif;
                                             ">
                                      <?php echo myTruncate($listing->data->title, 28) ?>
                            </span>
                        </a>

                        <br/>

                        <div style="
						<?php if ($size == 'tiny') echo "font-size:8px;" ?>
						<?php if ($size == 'small') echo "font-size:9px;" ?>
						<?php if ($size == 'normal') echo "font-size:10px;" ?>
						<?php if ($size == 'large') echo "font-size:11px;" ?>
                             font-family:sans-serif;
                             float:left;
                             margin-top: 0px;
                             margin-bottom: 0px;
                             ">
                            <a style="
                               text-decoration: none;
                               color:#B2B2B2;
                               "
                               href="http://www.etsy.com/shop/<?php echo $listing->data->shop_name ?>"
                               onmouseover="this.style.textDecoration='underline'"
                               onmouseout="this.style.textDecoration='none'"
                               >
                                   <?php echo myTruncate($listing->data->shop_name, 14) ?>
                               </a>
                           </div>

                           <div style="
                                color:#78C042;
                                font-size:10px;
                                font-family:sans-serif;
                                float:right;
                                margin-top: 0px;
                                margin-bottom: 0px;
                                ">
                               $<?php echo $listing->data->price ?>
                           </div>

                       </td>

                    <?php } ?>
                              </tr>
                <?php } ?>
                          </table>
                          <p style="
                             color:#B2B2B2;
                             font-size:10px;              
                             font-family:sans-serif;
                             margin-left: 10px;
                             ">
                              Sponsored by <a href="https://emailfromexcel.com">send bulk email from excel</a>.
                          </p>
                      </div>
                      <h2>
                          HTML code
                      </h2>
                      <h3>
                          Copy and paste the following HTML code into the page where you want to display the treasury.
                      </h3>
                      <div>
                          <textarea id="source" rows="20" cols="80">

                          </textarea>
                      </div>
        <?php } ?>
    </body>
</html>
