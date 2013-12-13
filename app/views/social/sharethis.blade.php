@if(Config::get('project.use_social'))
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "{{ Config::get('project.publisher') }}", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_email_large' displayText='Email'></span>
@endif