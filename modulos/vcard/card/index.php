<?php include '../agenciadigital/admin/conexion.php';?>

<!DOCTYPE html>
<!-- saved from url=(0022)https://qrco.de/bbB8gH -->
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="app" itemscope="" class="ng-scope" lang="es">
<head>
<?php echo $meta_chartset;?>
<style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo $page_url;?>../vcard/css/template_normal.min.css">
<title>Tarjeta de Contato</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo $page_url;?>favicon.ico" type="image/x-icon">
    
    <!--Facebook meta-->
    <meta property="og:url" content="http://multiportal.com.mx/vcard/">
    <meta property="og:title" content="Guillermo Jim&eacute;nez L&oacute;pez">
    <meta property="og:description" content="Desarrollo de Paginas Web y Marketing Digital">
    <meta property="og:image" content="http://qrcgcustomers.s3-eu-west-1.amazonaws.com/account5493273/3556709_1.png?0.0635479782185353">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="http://multiportal.com.mx/vcard/">
    <meta name="twitter:title" content="Guillermo Jim&eacute;nez L&oacute;pez">
    <meta name="twitter:description" content="Desarrollo de Paginas Web y Marketing Digital">
    <meta name="twitter:image" content="http://qrcgcustomers.s3-eu-west-1.amazonaws.com/account5493273/3556709_1.png?0.0635479782185353">
    <meta name="twitter:image:width" content="200">
    <meta name="twitter:image:height" content="200">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Guillermo Jim&eacute;nez L&oacute;pez">
    <meta itemprop="description" content="Desarrollo de Paginas Web y Marketing Digital">
    <meta itemprop="image" content="http://qrcgcustomers.s3-eu-west-1.amazonaws.com/account5493273/3556709_1.png?0.0635479782185353">
</head>
<body id="dvcard-body" ng-controller="ComplexController" class="whiteTheme">

<div class="loading-welcome active welcome-screen" ng-style="{&#39;background-color&#39;: view.code.welcome_extra.background || view.welcome_extra.background}" style="background-color: rgb(255, 255, 255); display: none;">
    <div class="progress">
        <div class="loading-bar indeterminate" ng-style="{&#39;background-color&#39;: view.code.color1 || view.color1}" style="background-color: rgb(0, 0, 0);"></div>
    </div>
    <div class="helper"></div>
    <img id="welcomeImg" imageonload="" ng-src="//qrcgcustomers.s3-eu-west-1.amazonaws.com/account5493273/3556708_1.png?0.39897709494591793" ng-style="{
            &#39;max-width&#39;: view.code.welcome_extra.zoom *2 || view.welcome_extra.zoom *2 + &#39;px&#39;,
            &#39;max-height&#39;: view.code.welcome_extra.zoom *2 || view.welcome_extra.zoom *2 + &#39;px&#39;,
            &#39;animation-iteration-count&#39; :  view.showPreview == &#39;infinite&#39; ? &#39;infinite&#39; : &#39;&#39;,
            &#39;animation-direction&#39; :  view.showPreview == &#39;infinite&#39; ? &#39;alternate&#39; : &#39;&#39;
            }" src="<?php echo $page_url;?>../vcard/fotos/logom2019.png" style="max-width: 100px; max-height: 100px; display: inline;">
</div><div class="vcard-template style2" id="rootElement">
    <div class="bgd-shadow"></div>
    <div class="page-home page">
        <div class="vcard-header gradient-red-orange-bg" ng-style="getBackgroundColor();" style="background: rgb(0, 0, 0);">
            <div class="vcard-header-wrapper">
                <div class="vcard-top-info">
                    <h4 class="top"></h4>

                    <div class="img ng-hide" ng-show="loadDemo &amp;&amp; view.avatar" ng-click="!loadDemo ?  &#39;&#39; : callAction($event,&#39;headerButton-avatar&#39;)" ng-style="{&#39;background&#39;:view.avatar?&#39;url(&#39;+view.avatar+&#39;)&#39;:&#39;none&#39;}" style="background: url(&quot;//qrcgcustomers.s3-eu-west-1.amazonaws.com/account5493273/3556709_1.png?0.0635479782185353&quot;);"></div>
                    <div class="img" ng-show="!loadDemo &amp;&amp; view.avatar" ng-style="{&#39;background&#39;:view.avatar?&#39;url(&#39;+view.avatar+&#39;)&#39;:&#39;none&#39;}" style="background: url(&quot;//qrcgcustomers.s3-eu-west-1.amazonaws.com/account5493273/3556709_1.png?0.0635479782185353&quot;);"></div>
                    <h2 class="name dynamicTextColor ng-binding" ng-show="view.firstname || view.lastname">Guillermo
                        Jim&eacute;nez L&oacute;pez</h2>

                    <h2 class="name dynamicTextColor ng-binding ng-hide" ng-hide="view.firstname || view.lastname">Multiportal</h2>
                    <h6 class="title dynamicTextColor ng-binding">Desarrollador Web</h6>
                </div>
                <div class="vcard-functions" ng-show="view.numbers_mobile ||  view.numbers_phone ||  view.email || ((view.city ||view.street|| view.zip|| view.country) &amp;&amp; view.show_directions)">
                    <div class="vcard-functions-wrapper">
                        <a class="header-button ng-hide" ng-show="loadDemo &amp;&amp; (view.numbers_mobile || view.numbers_phone)" ng-click="!loadDemo ?  &#39;&#39; : callAction($event,&#39;headerButton-call&#39;)" ng-style="{&#39;transition&#39;: loadDemo ? &#39;none&#39; : &#39;all 0.15s ease&#39;}" style="transition: all 0.15s ease 0s;">
    <i class="icon-phone dynamicTextColor"></i>
    <small class="dynamicTextColor">Call</small>
</a>

<a class="header-button ng-hide" ng-show="loadDemo &amp;&amp; (view.email)" ng-click="!loadDemo ?  &#39;&#39; : callAction($event,&#39;headerButton-email&#39;)" ng-style="{&#39;transition&#39;: loadDemo ? &#39;none&#39; : &#39;all 0.15s ease&#39;}" style="transition: all 0.15s ease 0s;">
    <i class="icon-send dynamicTextColor"></i>
    <small class="dynamicTextColor">Email</small>
</a>

<a href="tel:4426002842" ng-show="!loadDemo &amp;&amp; (view.numbers_mobile || view.numbers_phone)">
    <i class="icon-phone dynamicTextColor"></i>
    <small class="dynamicTextColor">Call</small>
</a>

<a href="mailto:multiportal@outlook.com?subject=From%20my%20vCard&amp;body=" target="_newEmail" ng-show="!loadDemo &amp;&amp; (view.email)" class="last-element">
    <i class="icon-send dynamicTextColor"></i>
    <small class="dynamicTextColor">Email</small>
</a>

<a ng-show="((view.street || view.city )&amp;&amp; view.show_directions)" ng-click="callAction($event, &#39;mapAction&#39;)" class="ng-hide">
    <i class=" icon-map-pin dynamicTextColor"></i>
    <small class="dynamicTextColor">Directions</small>
</a>


                    </div>
                </div>
            </div>
        </div>
        <div class="vcard-body-wrapper">
            <div class="vcard-body">
                <div ng-hide="view.numbers_mobile ||  view.numbers_phone ||  view.email || view.city ||view.street|| view.zip|| view.country || view.company || view.bio || view.website" class="ng-hide">
                    <div class="vcard-row">

                        <h4>Waiting for you to enter data</h4>

                    </div>
                    <div class="sk-three-bounce">
                        <div class="sk-child sk-bounce1"></div>
                        <div class="sk-child sk-bounce2"></div>
                        <div class="sk-child sk-bounce3"></div>
                    </div>

                </div>
                <div id="dvcard-details">
    <div class="vcard-row ng-hide" ng-show="view.birthday">
        <i class="icon icon-birthday"></i>
        <h4 class="ng-binding"></h4>
        <small>Birthday</small>
    </div>
    <div class="vcard-row" ng-show="view.bio">
        <h4 ng-bind-html="view.bio|nl2br" class="ng-binding">Desarrollo de P&aacute;ginas Web y Marketing Digital</h4>
    </div>
    <div class="vcard-separator" ng-show="view.bio"></div>
    <div class="vcard-row" ng-show="view.numbers_mobile">
        <i class="icon icon-phone"></i>
        <h4><a href="tel:4426002842" class="ng-binding">4426002842</a></h4>
        <small>Mobile</small>
    </div>
    <div class="vcard-row pt0 ng-hide" ng-show="view.numbers_phone">
        <i ng-show="view.numbers_phone &amp;&amp; !view.numbers_mobile" class="icon icon-phone ng-hide"></i>
        <h4><a href="tel:" class="ng-binding"></a></h4>
        <small>Telephone</small>
    </div>
    <div class="vcard-row pt0 ng-hide" ng-show="view.numbers_fax">

        <h4 class="ng-binding"></h4>
        <small>Fax</small>
    </div>
    <div class="vcard-separator" ng-show="view.numbers_mobile || view.numbers_phone"></div>
    <div class="vcard-row" ng-show="view.email">
        <i class="icon icon-mail"></i>
        <h4><a href="mailto:multiportal@outlook.com" target="_newLink" class="ng-binding">multiportal@outlook.com</a></h4>
        <small>Email</small>
    </div>
    <div class="vcard-separator" ng-show="view.street || view.zip || view.city || view.country || view.company "></div>
    <div class="vcard-row" ng-show="view.company">
        <i class="icon icon-work"></i>
        <h4 class="ng-binding">Multiportal</h4>
        <small ng-show="view.job" class="ng-binding">Desarrollador Web</small>
    </div>
    <div class="vcard-separator ng-hide" ng-show="view.venue || view.city || view.state || view.zip || view.street || view.country"></div>
    <div class="vcard-row ng-hide" ng-show="view.venue || view.city || view.state || view.zip || view.street || view.country">
        <label></label>
        <i class="icon icon-event-location"></i>
        <h4 class="ng-binding"></h4>
        <h4 class="ng-binding"> </h4>
        <h4 class="ng-binding"><span ng-show="view.state || view.zip" class="ng-binding ng-hide"><span ng-show="view.city" class="ng-hide">,</span>  </span>
        </h4>
        <h4 class="ng-binding"></h4>

        <!-- ngIf: view.show_directions --><div class="floated-container ng-scope ng-hide" ng-if="view.show_directions" ng-show="(view.street &amp;&amp; view.city) || (view.city &amp;&amp; view.country) || view.city || view.country">
            <a class="event-slim-button ripplelink left_15 mt-10" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" ng-click="callAction($event, &#39;mapAction&#39;)" style="color: rgb(0, 255, 0);">
                Show on map            </a>
        </div><!-- end ngIf: view.show_directions -->
    </div>
    <div class="vcard-separator ng-hide" ng-show="view.venue || view.city || view.state || view.zip || view.street || view.country"></div>

    <div class="vcard-row" ng-show="view.website">
        <i class="icon icon-earth"></i>
        <h4><a href="http://www.multiportal.com.mx/" target="_newLink" class="ng-binding">www.multiportal.com.mx</a></h4>
        <small>Website</small>
    </div>
    <div class="vcard-separator" ng-show="view.bio || view.numbers_mobile || view.numbers_phone || view.email || view.street || view.zip || view.city || view.country || view.company "></div>
    <div id="socialmedialinksContainer">
        <div class="vcard-social" style="margin-bottom:20px;">
            <!--        <h5>--><!--</h5>-->
            <!--        <a href="{{value|prefixURL}}" ng-repeat="(key, value) in view.socialmedialinks"><span-->
            <!--                    class="icon icon-wrapper {{key}}" target="_top"><i class="icon icon icon-{{key}}"></i></span></a>-->
            <div class="socialMedia-container" ng-show="view.code.channels.length &gt; 0">
                <label>Social Media</label>
                <i class="icon-social-media"></i>
                <div class="channels-padding mt-0">
                    <!-- ngRepeat: channel in view.code.channels track by $index --><a href="http://www.facebook.com/multiportal" target="_blank" class="channel-container ng-scope" id="channel-item-Facebook" ng-click="loadDemo ? callAction($event,&#39;channelAction&#39;) : &#39;&#39;" ng-repeat="channel in view.code.channels track by $index">
                        <div class="table-cell-middle pl-55 pos-relative">
                            <div class="channel-bgd-facebook">
                                <!-- ngIf: channel.name != 'Snapchat' --><i ng-if="channel.name != &#39;Snapchat&#39;" class="icon-social-facebook"></i><!-- end ngIf: channel.name != 'Snapchat' -->
                                <!-- ngIf: channel.name == 'Snapchat' -->
                            </div>
                        </div>
                    </a><!-- end ngRepeat: channel in view.code.channels track by $index -->
                </div>
            </div>
        </div>
    </div>

    <div class="vcard-row follow-scroll contactData-container fixed-button">
        <div class="fabs" id="saveContact">
    <div class="fixed-blur-bgd">
        <div class="chat">
            <div class="fab-body fab-step1">
                <div class="iconFab icon-fab-close"></div>
                <div class="fab-header" ng-style="{color: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" style="color: rgb(0, 255, 0);">
                    Save Contact Data                </div>
                <div class="fab-header text-regular">How would you like to save contact data?</div>
                <ul>
                    <li open-popup="email" class="addContactAction" ng-click="!loadDemo ? toggleFabStep(1,2) : callAction($event, &#39;addContactAction&#39;)">
                        <i class="iconFab icon-fab-share-email"></i>
                        <a href="https://qrco.de/bbB8gH">
                            Send by Email                        </a>
                    </li>
                    <li ng-click="loadDemo ? callAction($event, &#39;addContactAction&#39;) : &#39;&#39;" class="addContactAction">
                        <i class="iconFab icon-fab-share-savecontact"></i>
                        <!-- ngIf: !loadDemo --><!--a ng-if="!loadDemo" href="http://qrco.de/handlePost/bbB8gH/?download=true" rel="external" class="ng-scope"-->
                        <a href="guillermo.vcf" download >
                            Save to My Phone                        </a><!-- end ngIf: !loadDemo -->
                        <!-- ngIf: loadDemo -->
                    </li>
                </ul>

            </div>
            <div class="fab-body fab-step2" style="display:none;">
                <div class="iconFab icon-fab-close"></div>
                <div class="icon-event-back" ng-click="toggleFabStep(2,1)"></div>
                <div class="fab-header mt-10" ng-style="{color: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" style="color: rgb(0, 255, 0);">
                    <span class="emailText1">Send by Email</span>
                    <span class="emailText2">Email was send</span>
                </div>
                <div class="fab-header text-regular">
                    <span class="emailText1">Send contact details using email.</span>
                    <span class="emailText2">Please have a look to you inbox, the email will arrive shortly.</span>
                </div>
                <form action="https://qrco.de/bbB8gH#" method="post" class="ng-pristine ng-valid ng-valid-email">
                    <input class="fab-email-input ng-pristine ng-untouched ng-valid ng-valid-email" type="email" id="email" ng-model="email" placeholder="Enter Email Address">
                    <input type="hidden" id="YII_CSRF_TOKEN" name="YII_CSRF_TOKEN" value="12eaed937c4577e0d4bac59b51ee342577b028a0">
                    <div class="btn green block" ng-click="sendByEmail(email);" style="float: left;margin-top: 20px;">
                        Send                    </div>
                </form>
            </div>
        </div>
    </div>
    <a id="prime" class="fab" ng-style="{background:view.color2||&#39;#607d8b&#39;}" style="background: rgb(0, 255, 0);">
        <span class="hidden-xs" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : &#39;white&#39;}" style="color: white;">
            <i class="prime iconFab icon-fab-share-add" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : &#39;white&#39;}" style="color: white;"></i>
            Download vCard        </span>
        <i class="prime iconFab icon-fab-share-add visible-xs" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : &#39;white&#39;}" style="color: white;"></i>
    </a>
</div>
    </div>
    <div class="vcard-row follow-scroll share-container" ng-style="setPosition(&#39;share&#39;)">
        <div class="fabs" id="shareFab">
    <div class="fixed-blur-bgd" style="display: none;">
        <div class="chat">
            <div class="fab-body">
                <div class="iconFab icon-fab-close"></div>
                <div class="fab-header" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" style="color: rgb(0, 255, 0);">Share</div>
                <ul class="ssk-block ssk-md" data-url="http://multiportal.com.mx/vcard/" data-text="">
                    <li>
                        <i class="iconFab icon-fab-share-facebook"></i>
                        <a href="https://qrco.de/bbB8gH" class="ssk ssk-text ssk-facebook">Facebook</a>
                    </li>
                    <li>
                        <i class="iconFab icon-fab-share-twitter"></i>
                        <a href="https://qrco.de/bbB8gH" class="ssk ssk-text ssk-twitter">Twitter</a>
                    </li>
                    <li>
                        <i class="iconFab icon-fab-share-googleplus"></i>
                        <a href="https://qrco.de/bbB8gH" class="ssk ssk-text ssk-google-plus">Google+</a>
                    </li>
                    <li>
                        <i class="iconFab icon-fab-share-whatsapp"></i>
                        <a href="whatsapp://send?text=http://multiportal.com.mx/vcard/" class="ssk ssk-whatsapp">Whatsapp</a>
                    </li>
                    <li>
                        <i class="iconFab icon-fab-share-email"></i>
                        <a href="mailto:?body=http://multiportal.com.mx/vcard/" target="_blank">Email</a>
                    </li>
                    <li>
                        <i class="iconFab icon-fab-share-message"></i>
                        <input id="shortUrl" value="http://multiportal.com.mx/vcard/" readonly>
                        <button id="copyButton">Copy</button>
                        <div class="ifCopySucceed ng-hide" ng-show="ifCopySucceed">
                            Text copied to the clipboard.                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ngIf: view.sharing --><a id="prime" class="fab white-bgd ng-scope" ng-if="view.sharing" ng-click="!loadDemo ?  &#39;&#39; : callAction($event,&#39;shareAction&#39;)">
        <span class="hidden-xs">
            <i class="prime icon iconFab icon-fab-share"></i>
            Share this page        </span>
        <i class="prime icon iconFab icon-fab-share visible-xs"></i>
    </a><!-- end ngIf: view.sharing -->
</div>    </div>

    <div id="gotIt">
    <div class="fixed-blur-bgd">
        <div class="dialog-container">
            <div class="fab-body">
                <div class="event-gotIt-button">
                </div>
                <div class="dialog-body pull-left ng-binding">
                    
                </div>
                <a class="text-regular-blue mt-20" ng-click="closeGotItDialog()">
                    Got it                </a>
            </div>
        </div>
    </div>
</div>
</div>

            </div>
        </div>
    </div>

    <div class="page-maps page hidden">
        <div class="devent-map-header">
            <div class="event-section-title " ng-style="getBackgroundColor();" style="background: rgb(0, 0, 0);">
                <div class="event-content-container">
                    <i class="icon-event-back dynamicTextColor" ng-click="switchPages(&#39;page-maps&#39;,&#39;page-home&#39;, false)"></i>
                    <div class="event-title dynamicTextColor">Location</div>
                </div>
            </div>
        </div>
        <div class="event-body">
            <div class="vcard-body-wrapper">
                <div class="vcard-body">
                    <div id="dvcard-maps">
    <div>
        <img>
        <div ng-show="resetMap &amp;&amp; (view.venue || view.city || view.state || view.zip)" ng-click="resetMap=false; setMapUrl()" class="reset-map ng-hide">Reset map</div>
    </div>
    <div class="vcard-row ng-hide" ng-show="view.venue || view.city || view.state || view.zip">
        <label>Where</label>
        <i class="icon icon-event-location"></i>
        <!--<h4>{{view.venue}}</h4>-->
        <h4 class="ng-binding"> </h4>
        <h4 class="ng-binding"><span ng-show="view.state || view.zip" class="ng-binding ng-hide"><span ng-show="view.city" class="ng-hide">,</span>  </span>
        </h4>
        <h4 class="ng-binding"></h4>
        <input id="addressValue" type="hidden" ng-value="view.street + &#39;,&#39;  + view.city + &#39;,&#39; + view.country " value=",,">
        <div class="floated-container">
            <a class="event-slim-button ripplelink left_20 mt-10" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" ng-click="callAction($event, &#39;redirectToMap&#39;)" style="color: rgb(0, 255, 0);">
                Show directions            </a>
        </div>
    </div>
</div>
                    <div id="redirectToMaps">
                        <div class="fixed-blur-bgd">
                            <div class="dialog-container">
                                <div class="fab-body">
                                    <div class="event-title">
                                        Use Google Maps                                    </div>
                                    <div class="dialog-body">
                                        Directions will open in Google Maps.                                        Do you want to continue?                                    </div>
                                    <a class="event-slim-button ripplelink mt-10 pull-right" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" ng-click="dialogRedirectCallback(false)" style="color: rgb(0, 255, 0);">
                                        No                                    </a>
                                    <a class="event-slim-button ripplelink mt-10 pull-right" ng-style="{&#39;color&#39;: isColorLight(view.color2) ? &#39;black&#39; : view.color2}" ng-click="dialogRedirectCallback(true, &#39;https://maps.google.com/maps?daddr=&#39;+getMapAddress())" style="color: rgb(0, 255, 0);">
                                        Yes                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--    --></div>
<script type="text/javascript" src="<?php echo $page_url;?>../vcard/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $page_url;?>../vcard/js/angular.rendering.min.js"></script>
<script type="text/javascript">
/*<![CDATA[*/


    /**
     * Angular connection
     */
    app.loadBasePreviewController();
    /**
     * Replace a point with a space character
     * @usage dvcard reu
     */
    app.filter('point2space', function () {
        return function (input) {
            if (input) {
                return input.replace(/\./g, ' ');
            }
        }
    });

    app.filter('toIconName', function () {
        return function (input) {
            if (input) {
                return input.replace(/\s+/g, '').toLowerCase();
            } else
                return ' ';
        };
    });

    /**
     * Return value with '-' instead of spaces
     *
     * @param input - string
     * */
    app.filter('dashEncode', function () {
        return function (input) {
            if (input) {
                return input.replace(/ /g, "-");
            } else
                return ' ';
        };
    });

    /**
     * Return link with the correct prefix
     * */
    app.filter('prefixChannel', ['$filter', function ($filter) {
        return function (input, name) {
            if (input) {
                switch (name) {
                    case ('Twitter'):
                        if (input.match(/twitter.com|http|www/g))
                            return input;
                        return $filter('prefixURL')('www.twitter.com/' + input);
                        break;
                    case ('Instagram'):
                        if (input.match(/instagram.com|http|www/g))
                            return input;
                        return $filter('prefixURL')('www.instagram.com/' + input.replace('@', ''));
                        break;
                    case ('Snapchat'):
                        if (input.match(/snapchat.com|http|www/g))
                            return input;
                        return $filter('prefixURL')('www.snapchat.com/add/' + input);
                        break;
                    case ('WeChat'):
                        return 'weixin://dl/chat?' + input;
                        break;
                    case ('Skype'):
                        return 'skype:' + input + '?add';
                        break;
                    case ('Line'):
                        return $filter('prefixURL')('http://line.naver.jp/ti/p/@' + input);
                        break;
                    default:
                        return $filter('prefixURL')(input);
                        break;
                }
            } else
                return ' ';
        };
    }]);

    /**
     * The QR service for the app.
     * */
    app.service('qr', function () {
        /**
         * Scroll page from buttom to top
         * */
        this.scrollFromBottomtoTop = function (loadDemo) {
            setTimeout(function () {
                if (loadDemo == true) {
                    $("html, body").animate({
                        scrollTop: $('#socialmedialinksContainer').offset().top
                    }, 0)
                    ;$("html, body").animate({
                        scrollTop: 0
                    }, 1000);
                }
            }, 0)
        }
    });

    /**
     * Directive
     *
     * When image is loaded fadeout welcome screen
     * */
    app.directive('imageonload', ['qr', function (qr) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                element.bind('load', function () {
                    $("#welcomeImg").fadeIn(1000);
                    window.setTimeout(function () {
                        $(".loading-welcome.welcome-screen").fadeOut();
                        scope.welcomeScreenScrollWindow++;
                        if (scope.welcomeScreenScrollWindow == 1) {
                            qr.scrollFromBottomtoTop(scope.loadDemo)
                        }
                    }, 2000);
                });
                element.bind('error', function () {
                });
            }
        };
    }]);


    //Override the base preview controller
    app.controller('ComplexController', function ($scope, $controller, $sce, $rootScope, $filter, previewService, $window) {

        /**
         * List of media channels with all the information
         * */
        $scope.fullChannels = [
            {
                icon: "icon-channel-website",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.mywebsite.com",
                input_label_placeholder: 'Visit our website',
                name: "Website"
            },
            {
                icon: "icon-channel-facebook",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.facebook.com/page",
                input_label_placeholder: 'Like our page',
                name: "Facebook"
            },
            {
                icon: "icon-channel-twitter",
                type: "handle",
                input_prefix_label: "@",
                input_prefix_placeholder: 'Username',
                input_label_placeholder: 'Follow us',
                name: "Twitter"
            },
            {
                icon: "icon-channel-instagram",
                type: "handle",
                input_prefix_label: "@",
                input_prefix_placeholder: 'Username',
                input_label_placeholder: 'Follow us',
                name: "Instagram"
            },
            {
                icon: "icon-channel-snapchat",
                type: "handle",
                input_prefix_label: "ID",
                input_prefix_placeholder: 'Username',
                input_label_placeholder: 'View My Story',
                name: "Snapchat"
            },
            {
                icon: "icon-channel-youtube",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.youtube.com/user/mychannel",
                input_label_placeholder: 'Subscribe to our channel',
                name: "YouTube"
            },
            {
                icon: "icon-channel-pinterest",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.pinterest.com/username",
                input_label_placeholder: 'Follow us',
                name: "Pinterest"
            },
            {
                icon: "icon-channel-googleplus",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.google-plus.com/username",
                input_label_placeholder: 'Follow us',
                name: "Google Plus"
            },
            {
                icon: "icon-channel-linkedin",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.linkedin.com/company/name",
                input_label_placeholder: 'Join my network',
                name: "LinkedIn"
            },
            {
                icon: "icon-channel-xing",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.xing.com/company/name",
                input_label_placeholder: 'Join my network',
                name: "Xing"
            },
            {
                icon: "icon-channel-flickr",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.flickr.com/photos/flickr",
                input_label_placeholder: 'Follow us',
                name: "Flickr"
            },
            {
                icon: "icon-channel-vimeo",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.vimeo.com/channels/mychannel",
                input_label_placeholder: 'Follow us',
                name: "Vimeo"
            },
            {
                icon: "icon-channel-dribbble",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.dribbble.com/company",
                input_label_placeholder: 'View my portfolio',
                name: "Dribbble"
            },
            {
                icon: "icon-channel-vkontakte",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.vk.com/name",
                input_label_placeholder: 'Follow us',
                name: "VKontakte"
            },
            {
                icon: "icon-channel-tripadvisor",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.tripadvisor.com/name",
                input_label_placeholder: 'Review us',
                name: "Tripadvisor"
            },
            {
                icon: "icon-channel-wechat",
                type: "handle",
                input_prefix_label: "ID",
                input_prefix_placeholder: 'User ID',
                input_label_placeholder: 'Add me',
                name: "WeChat"
            },
            {
                icon: "icon-channel-line",
                type: "handle",
                input_prefix_label: "ID",
                input_prefix_placeholder: 'User ID',
                input_label_placeholder: 'Add me',
                name: "Line"
            },
            {
                icon: "icon-channel-reddit",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.reddit.com/username",
                input_label_placeholder: 'Comment on my latest post',
                name: "Reddit"
            },
            {
                icon: "icon-channel-tumblr",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "https://username.tumblr.com/",
                input_label_placeholder: 'Follow us',
                name: "Tumblr"
            },
            {
                icon: "icon-channel-github",
                type: "url",
                input_prefix_label: "URL",
                input_prefix_placeholder: "www.github.com/username",
                input_label_placeholder: 'Follow us',
                name: "Github"
            },
            {
                icon: "icon-channel-skype",
                type: "handle",
                input_prefix_label: "ID",
                input_prefix_placeholder: 'User ID',
                input_label_placeholder: 'Add me',
                name: "Skype"
            }
        ];

        /**
         * Get the prefix of the channel
         *
         * @param channelName
         * */
        function getPrefix(channelName) {
            var keepGoing = true,
                prefix = "";
            angular.forEach($scope.fullChannels, function (value, key) {
                if (keepGoing) {
                    if (value.name == channelName) {
                        prefix = value.input_prefix_label;
                        keepGoing = false;
                    }
                }

            });
            return prefix;
        }

        /**
         * Convert channel name to "Aaaaa"
         *
         * @param str
         * */
        function toTitleCase(str) {
            if (str == "youtube")
                return "YouTube";
            if (str == "vkontakte")
                return "VKontakte";
            if (str == "linkedin")
                return "LinkedIn";
            else
                return str.replace(/\w\S*/g, function (txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                });
        }

        /**
         * Initialize social media channels from old to new format
         *
         * */
        $scope.initSocialChannels = function () {
            $scope.channels = [];
            if (!$scope.loadDemo && !$scope.view.code && $scope.view.socialmedialinks) {
                if (!$scope.view.code) {
                    $scope.view.code = {};
                }
                $scope.modelChannelsOld = false;
                if (!$scope.view.code.channels) {
                    $scope.view.code.channels = [];
                    $scope.modelChannelsOld = true;
                }
                angular.forEach($scope.view.socialmedialinks, function (value, key) {
                    var keyName = toTitleCase(key),
                        elemExtraInfo = $scope.getExtraChannelInfo(keyName);

                    var fullElemObj = {
                        input_prefix_label: getPrefix(keyName),
                        name: keyName,
                        link: value,
                        input_prefix_placeholder: elemExtraInfo.input_prefix_placeholder,
                        input_label_placeholder: elemExtraInfo.input_label_placeholder,
                        type: elemExtraInfo.type
                    };
                    $scope.channels.push(fullElemObj);

                    if ($scope.modelChannelsOld) {
                        $scope.view.code.channels.push({
                            input_prefix_label: getPrefix(keyName),
                            name: keyName,
                            link: value,
                            type: elemExtraInfo.type,
                            label: ''
                        });
                    }
                });
            }
        };

        /**
         *
         * Get all information about a channel based on the name.
         *
         * @param name - channel name
         * */
        $scope.getExtraChannelInfo = function (name) {
            for (var i = 0; i < $scope.fullChannels.length; i++) {
                if ($scope.fullChannels[i].name == name) {
                    return {
                        "input_prefix_placeholder": $scope.fullChannels[i].input_prefix_placeholder,
                        "input_label_placeholder": $scope.fullChannels[i].input_label_placeholder,
                        "type": $scope.fullChannels[i].type
                    }
                }
            }
        };

        $scope.welcomeScreenScrollWindow = 0;

        //Inherrit from basePreviewController
        angular.extend(this, $controller('BasePreviewController', {$scope: $scope}));

        $scope.loadDemo = parent && typeof parent.ImHere === "function";

        //Get the json data form the file
        json_data = {"show_directions":true,"form":[{"section_design":{"fold":false}},{"section_information":{"fold":false}},{"section_social":{"fold":false}},{"section_welcome_screen":[]},{"section_advance_options":{"fold":false}}],"color1":"#000000","color2":"#00ff00","avatar_extra":{"zoom":100,"background":"#ffffff"},"showAutocomplete":true,"address":[],"code":{"channels":[{"input_prefix_label":"URL","link":"www.facebook.com\/multiportal","label":"","name":"Facebook"}],"welcome_extra":{"zoom":50,"background":"#ffffff"}},"welcome_screen":"\/\/qrcgcustomers.s3-eu-west-1.amazonaws.com\/account5493273\/3556708_1.png?0.39897709494591793","firstname":"Guillermo","lastname":"Jim\u00e9nez L\u00f3pez","numbers_mobile":"4426002842","email":"multiportal@outlook.com","company":"Multiportal","job":"Desarrollador Web","website":"www.multiportal.com.mx","showPreview":1,"avatar":"\/\/qrcgcustomers.s3-eu-west-1.amazonaws.com\/account5493273\/3556709_1.png?0.0635479782185353","sharing":true,"bio":"Desarrollo de Paginas Web y Marketing Digital"};

//        //Upgrade old vcards created before 13.04 with show_directions parameter
//        if (angular.isUndefined(json_data.show_directions))
//            json_data.show_directions = true;

        previewService.pushData(json_data);

        //All this inputs are linked to the action bar
        $scope.$watchGroup(['view.numbers_mobile', 'view.numbers_phone', 'view.email', 'view.street', 'view.zip', 'view.country', 'view.city', 'view.show_directions'], function (newValues, oldValues, $scope) {

            //This helps to remove the border from the last available action element
            window.setTimeout(function () {
                $(".vcard-functions-wrapper a").removeClass("last-element");
                $(".vcard-functions-wrapper a:visible:last").addClass("last-element")
            }, 50);

        });


        $scope.initSocialChannels();

        function getBackgroundColor() {
            var color1 = $scope.view.color1 || '#607d8b';
            var color1b = $scope.view.color1b || '#607d8b';

            if (!$scope.view.show_gradient)
                return {"background": color1};
            else
                return {
                    "background": "none",
                    "background-image": "linear-gradient(45deg," + $scope.view.color1 + " 0%," + $scope.view.color1 + " 1%," + $filter('colorLuminance')($scope.view.color1b, -0.2) + " 100%)"
                };
        }

        $scope.sendByDownload = sendByDownload;
        $scope.sendByEmail = sendByEmail;
        $scope.getBackgroundColor = getBackgroundColor;

        function triggerPost(action, email, callback) {
            if (action == "download")
                return true;

            $.post("/handlePost/bbB8gH", {
                action: action,
                email: email,
                YII_CSRF_TOKEN: YII_CSRF_TOKEN
            }, function (result) {
                callback(result);
            }, "json");

        }

        /**
         * Toggle email form with the fab first view
         * */
        function toggleEmailForm() {
            $('.emailText1').toggle();
            $('.emailText2').toggle();
            $('.fab-body form').toggle();
            $('.icon-event-back').toggle();
        }

        /**
         * Trigger sending via email
         */
        function sendByEmail(email) {

            triggerPost("email", email, function (result) {
                if (result.status == "success") {
                    toggleEmailForm();
                    window.setTimeout(function () {
                        $scope.toggleFabStep(2, 1);
                        toggleEmailForm();
                        $('#saveContact .fab-step1 .icon-fab-close').click();
                    }, 2000);
                } else {

                }
            });
            return false;
        }

        /**
         * Trigger download action of the vCard
         */
        function sendByDownload() {
            triggerPost("download");
        }

        /**
         * Toggle between stepts in the fab
         *
         * @param stepOut - step to hide
         * @param stepIn - step to show
         * */
        $scope.toggleFabStep = function (stepOut, stepIn) {
            $(".fab-body.fab-step" + stepOut).toggle();
            $(".fab-body.fab-step" + stepIn).toggle();
        };


        /**
         * Watch showPreview value
         *
         * @param p1 - new value
         * @param p2 - old value
         * */
        $scope.$watch("view.showPreview", function (p1, p2, p3) {
            if (p1 != undefined && p1 == 'infinite') {
                setTimeout(function () {
                    $(".loading-welcome.welcome-screen").show();
                    $("#welcomeImg").fadeIn(1000);
                }, 500)
            } else if (p1 == undefined && p2 != undefined && p2 == 'infinite') {
                $("#welcomeImg").hide();
                $(".loading-welcome").fadeOut();
            } else if ((p1 != undefined && p2 != undefined && p1 != p2 ) || (p1 != undefined && p1 != 0 && p2 == undefined && p1 != p2)) {
                setTimeout(function () {
                    $(".loading-welcome.welcome-screen").show();
                    $("#welcomeImg").hide();
                    $("#welcomeImg").fadeIn(1000);
                    setTimeout(function () {
                        $(".loading-welcome").fadeOut();
                    }, 2000)
                }, 500)
            }
        });


        /**
         * Set text color based on the background
         *
         * @param color - background color
         * */
        $scope.isColorLight = function (color) {
            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(color)) {
                c = color.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');

                var r = (c >> 16) & 255,
                    g = (c >> 8) & 255,
                    b = c & 255;
                // Counting the perceptive luminance
                // human eye favors green color...
                var a = 1 - (0.240 * r + 0.470 * g + 0.150 * b) / 255;
                return (a < 0.4);
            }
        };

        /**
         * Get channel name from channel item
         *
         * @param channel
         * */
        $scope.getChannelLink = function (channel) {
            if (!$scope.loadDemo) {
                return $filter('prefixChannel')(channel.link, channel.name);
            }
            return '#channel-item-' + channel.name;
        };

        /**
         * Get channel name or link to the channel based on channel info
         *
         * @param channel
         * */
        /**
         * Open the dialog popup
         * Event is for getting the current target element
         * Target:
         *      - shareAction: Button with got it information
         *      - channelAction: Button with got it information
         *      - redirectToMap: Button redirect to google maps page
         *      - mapAction: Button redirect to location page
         *
         * @param event - string
         * @param target - string
         * */
        $scope.callAction = function (event, target) {
            switch (target) {
                case 'headerButton-call':
                    if ($scope.loadDemo) {
                        $scope.gotItText = 'Users can click on this button to call your mobile number.';
                        $scope.toggleDialog('gotIt', $(event.currentTarget));
                        setTimeout(function () {
                            $('.event-gotIt-button .header-button').css({
                                'background': $scope.view.color1
                            })
                        }, 0)
                    }
                    break;
                case 'headerButton-email':
                    if ($scope.loadDemo) {
                        $scope.gotItText = 'Users can tap this button to send you an email.';
                        $scope.toggleDialog('gotIt', $(event.currentTarget));
                        setTimeout(function () {
                            $('.event-gotIt-button .header-button').css({
                                'background': $scope.view.color1
                            })
                        }, 0)
                    }
                    break;
                case 'headerButton-avatar':
                    if ($scope.loadDemo) {
                        $scope.gotItText = 'Profile pictures are optional. Your image will be included when users save your contact details to their smartphone address book.';
                        $scope.toggleDialog('gotIt', $(event.currentTarget));
                    }
                    break;
                case 'shareAction':
                    if ($scope.loadDemo) {
                        $scope.gotItText = 'Users can tap this button to share your page.';
                        $scope.toggleDialog('gotIt', $(event.currentTarget));
                    }
                    break;
                case 'addContactAction':
                    if ($scope.loadDemo) {
                        $scope.gotItText = 'Your visitors can click this button to download or send your vCard.';
                        $scope.toggleDialog('gotIt', $(event.currentTarget));
                    }
                    break;
                case 'channelAction':
                    if ($scope.loadDemo) {
                        $scope.gotItText = 'By tapping here, users are navigated to the linked social media profile or website.';
                        $scope.toggleDialog('gotIt', $(event.currentTarget));
                    }
                    break;
                case 'redirectToMap':
                    $scope.toggleDialog('redirectToMaps');
                    break;
                case 'mapAction':
                    if ($scope.loadDemo) {
                        if ($scope.view.street || $scope.view.city || $scope.view.country) {
                            $scope.switchPages('page-home', 'page-maps', true);
                            $scope.setMapUrl();
                        } else {
                            $scope.gotItText = "'Google Maps will open upon clicking this button.'";
                            $scope.toggleDialog('gotIt', $(event.currentTarget));
                        }
                    } else {
                        $scope.switchPages('page-home', 'page-maps', true);
                        $scope.setMapUrl();
                    }
                    break;
            }
        };


        /**
         * Return address based on the street and street no., city, state, zip and country
         *
         * */
        $scope.getMapAddress = function () {
            var address = "";
            if ($scope.view) {
                if ($scope.view.street)
                    address += $filter('dashEncode')($scope.view.street) + ($scope.view.street_number ? "-" + $scope.view.street_number : '') + ",";

                if ($scope.view.city)
                    address += $filter('dashEncode')($scope.view.city) + ",";

                if ($scope.view.state)
                    address += $filter('dashEncode')($scope.view.state) + ",";

                if ($scope.view.zip)
                    address += $filter('dashEncode')($scope.view.zip) + ",";


                if ($scope.view.country)
                    address += $filter('dashEncode')($scope.view.country);
                if (address[address.length - 1] == ',')
                    address.slice(0, -1);
            }
            return address;
        };

        /**
         * Set map url
         * !Important!
         * We have to provide valid google api key
         *
         * */
        $scope.setMapUrl = function () {
            //Google API key
            var key = "AIzaSyC3NTJuu0bay53iHC_2j7EQuAn9Xnh7lXc",
                zoom = 15;

            if ($scope.view.city && !$scope.view.street)
                zoom = 12;
            if ($scope.view.country && !$scope.view.city)
                zoom = 5;
            if ($scope.view.country && $scope.view.zip && !$scope.view.city)
                zoom = 12;
            $scope.mapURL = "https://maps.googleapis.com/maps/api/staticmap?zoom=" + zoom + "&size=" + ($('.page-maps .vcard-body-wrapper').width() > 0 ? $('.page-maps .vcard-body-wrapper').width() : 320) + "x360&markers=size:mid%7Ccolor:red%7C" + $scope.getMapAddress() + "&key=" + key;
        };

        /**
         * Switch pages between startPage and endPage
         *
         * @param startPage - class of the page
         * @param endPage - class of the page
         * @param direction - string
         * */
        $scope.switchPages = function (startPage, endPage, direction) {
            if (endPage.indexOf('home') < 0) {
                if ($(window).innerWidth() < 690) {
                    $('.blur-bgd-shadow').hide();
                    $('.blur-bgd').hide();
                } else {
                    $(".page-maps .devent-map-header").prependTo(".page-maps .vcard-body-wrapper");
                }
            }
            else {
                $('.blur-bgd-shadow').show();
                $('.blur-bgd').show();
            }
            $('.' + startPage).animate({opacity: '0'}, 700).hide();
            $('.' + endPage).css({'display': 'block'}).animate({'opacity': '1'}, 700);
        };

        /**
         * Callback of the dialog yes/no buttons
         * Can close the dialog or it can redirect to a url and close the dialog
         *
         * @param proceed - string
         * @param url - current target
         * */
        $scope.dialogRedirectCallback = function (proceed, url) {
            if (proceed) {
                if (url) {
                    $window.open(url, '_blank');
                }
                $scope.closeDialog();
            } else {
                $scope.closeDialog();
            }
        };

        /**
         * Toggle dialog
         *
         * @param id - string
         * @param element - current target
         * */
        $scope.toggleDialog = function (id, element) {
            if (element) {
                var elem = element.context.outerHTML;
                $('#' + id + ' .dialog-container .event-gotIt-button').html(elem);
            }
            $($('#' + id).parent()).toggleClass('fabOnTop');
            $('#' + id + ' .dialog-container').toggleClass('is-visible');
            $('#' + id + ' .fixed-blur-bgd').toggle();
        };

        /**
         * Close dialog
         *
         * */
        $scope.closeDialog = function () {
            $('.dialog-container').removeClass('is-visible');
            $('#prime.fab').removeClass('disabledClick');
            $('.event-gotIt-button').html('');
            $('.fixed-blur-bgd').hide();
        };

        /**
         * Close got it dialog
         *
         * */
        $scope.closeGotItDialog = function () {
            $('#gotIt .dialog-container').removeClass('is-visible');
            $('#prime.fab').removeClass('disabledClick');
            $('.event-gotIt-button').html('');
            $('#gotIt .fixed-blur-bgd').hide();
        };

        /**
         * Function checks if all the objects in an array are undefined
         *
         * @param input - array with objects
         * */
        function arrayContainAllUndObj(item) {
            var count = 0;
            for (var i = 0; i < item.length; i++) {
                if (item[i] == undefined) {
                    count++;
                }
            }
            return count == item.length;
        }

        /**
         * Watch model address
         * If the objects inside newValue and oldValue are not undefined and newValue is different then oldValue
         * then show resetMap and create the autocomplete
         * else hide the resetMap button
         *
         * */
        $scope.$watchGroup(['view.street', 'view.street_number', 'view.city', 'view.country', 'view.zip', 'view.state'], function (newVal, oldVal) {
            if (!arrayContainAllUndObj(newVal) && !arrayContainAllUndObj(oldVal)) {
                if (newVal != oldVal) {
                    $scope.resetMap = true;
                } else {
                    $scope.resetMap = false;
                }
            }
        });


        /**
         * Set position of the fab Button
         *
         * @param buttonName - string
         * */
        $scope.setPosition = function (buttonName) {
            if ($(window).innerWidth() < 667) {
                var bottom = '75px',
                    right = '17px',
                    display = 'block';
                if (buttonName === 'contactData') {
                    bottom = '5px';
                    return {}; // For contact button, do nothing as everything works with CSS, looks like.
                } else {
                    display = $scope.view.sharing ? 'block' : 'none';
                }
                if ($(window).innerWidth() < 321)
                    right = '-50px';
                return {
                    'display': display,
                    'position': 'fixed',
                    'bottom': bottom,
                    'right': right,
                    'width': '80px'
                }
            }
            return '';
        };


        /**
         * Copy short ulr to clipboard
         *
         * @param elem - input element with the link
         * */
        $scope.ifCopySucceed = false;
        $scope.copyLinkToClipboard = function (elem) {
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch (e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            $scope.$apply(function () {
                $scope.ifCopySucceed = succeed;
            });
            setTimeout(function () {
                $scope.$apply(function () {
                    $scope.ifCopySucceed = false;
                });
            }, 1500)
        };

        $(document).ready(function () {
            /**
             * To work, function 'copyLinkToClipboard' needs to be called from an event listener on the copy button
             * */
            document.getElementById("copyButton").addEventListener("click", function () {
                $scope.copyLinkToClipboard(document.getElementById("shortUrl"));
            });
        })
    });


    if (parent && typeof parent.ImHere === "function") {
        parent.ImHere();
    } else {
        //Only load this on standalone pages not inframe working
        SocialShareKit.init();
    }

    /**
     * Toggle fab
     *
     * @param id - id of the fab
     */
    function toggleFab(id) {
        $(id + ' .prime').toggleClass('is-active');
        $(id + ' #prime').toggleClass('is-float');
        $($(id).parent()).toggleClass('fabOnTop');
        $('#prime.fab').toggleClass('disabledClick');
        $(id + ' .fixed-blur-bgd').toggle();
        $(id + ' .chat').toggleClass('is-visible');
    }


    /**
     * Fixes opening external urls
     */
    var saveWindowOpenFunction = false;
    $(document).ready(function () {

        /**
         * On window resize if width is bigger then tablet remove calendar and share mobile style
         * */
        $(window).resize(function () {
            if (window.innerWidth >= 667) {
                $('.follow-scroll.share-container').removeAttr('style');
            }
        });

        /**
         * Close fab from close icon
         * */
        $('#prime, .icon-fab-close').click(function () {
            var id = $($(this).closest('.fabs')).attr('id');
            toggleFab('#' + id);
        });

        $('#prime').click(function () {
            var id = $($(this).closest('.fabs')).attr('id');
            if (id == 'saveContact') {
                $(".fab-body.fab-step" + 1).show();
                $(".fab-body.fab-step" + 2).hide();
            }
        });

        /**
         * Close fab on blur bgd click
         * */
        $('.fixed-blur-bgd').click(function () {
            if (event && event.target == $(this)[0]) {
                $('.vcard-row.follow-scroll').removeClass('fabOnTop');
                $('.prime').removeClass('is-active');
                $('#prime').removeClass('is-float');
                $('#prime.fab').removeClass('disabledClick');
                $('.chat, .dialog-container').removeClass('is-visible');
                $('.fixed-blur-bgd').hide();
            }
        });

        /**
         * Ripple effect on element
         */
        var ink, d, x, y;
        $(".ripplelink").click(function (e) {
            if ($(this).find(".ink").length === 0) {
                $(this).prepend("<span class='ink'></span>");
            }

            ink = $(this).find(".ink");
            ink.removeClass("animate");

            if (!ink.height() && !ink.width()) {
                d = Math.max($(this).outerWidth(), $(this).outerHeight());
                ink.css({height: d, width: d});
            }

            x = e.pageX - $(this).offset().left - ink.width() / 2;
            y = e.pageY - $(this).offset().top - ink.height() / 2;

            ink.css({top: y + 'px', left: x + 'px'}).addClass("animate");
        });


        /*
         * window.open gets overwritten so we save this before using and reset everytime
         * */
        if (!saveWindowOpenFunction)
            saveWindowOpenFunction = window.open;
        $('a[rel*=external]').click(function () {
            //Reset window open because it will be overriden on mobile devices
            window.open = saveWindowOpenFunction;

            //This has only chrome on iOs
            //Start the download directly because chrome is preventing window.open
            if (navigator.userAgent.match('CriOS'))
                return true;

            var failed = false;
            try {//Try to open the url it will fail on inapp browsers
                open = window.open($(this).attr('href'), '_system');
            }
            catch (e) {
                failed = true;
            }

            if (open == null || failed == true || typeof(open) == 'undefined' || open.location == window.location)
                alert("Download is not allowed by this scanner app. Please open this page in your default browser e.g. chrome or safari");

            return false;
        });
    });

/*]]>*/
</script>




</body></html>