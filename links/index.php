<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

?>
<script type="text/javascript">
//<![CDATA[
window.onload = function() {
  menuInit();
  registerKeyEventListener();
  initApp();
};
function handleKeyCode(kc) {
  if (kc==VK_UP) {
    menuSelect(selected-1);
    return true;
  } else if (kc==VK_DOWN) {
    menuSelect(selected+1);
    return true;
  } else if (kc==VK_ENTER) {
    var liid = opts[selected].getAttribute('name');
    if (liid=='exit') {
      document.location.href = '../index.php';
    } else {
      runStep(liid);
    }
    return true;
  }
  return false;
}
function runStep(name) {
  if (name=='czech') {
    document.location.href = 'http://hbbtv.ceskatelevize.cz/ivyisilani/';
  } else if (name=='ard1') {
    document.location.href = 'http://hbbtv.ardmediathek.de/hbbtv-ard/mediathek/?devicegroup=hbbtv&context=hbbtv';
  } else if (name=='ard2') {
    document.location.href = 'http://hbbtv.ardmediathek.de/hbbtv-ard/mediathek/?devicegroup=hbbtv&context=portal';
  } else if (name=='zdf') {
    document.location.href = 'http://hbbtv.zdf.de/zdfm/index.php?portal=1&noclose=1';
  } else if (name=='ses') {
    document.location.href = 'http://replay.hdpportal.de/replayportal/index.html';
  } else if (name=='ses2') {
    document.location.href = 'http://93.104.253.198/mpr-test/';
  } else if (name=='rtl1') {
    document.location.href = 'http://hbbtv.clipfish.de/index.php?app=comedy&returnapp=redbutton_rtl';
  } else if (name=='rtl2') {
    document.location.href = 'http://hbbtv.clipfish.de/index.php?app=music&returnapp=redbutton_rtl';
  } else if (name=='rtl3') {
    document.location.href = 'http://hbbtv.clipfish.de/index.php?app=anime&returnapp=redbutton_rtl';
  } else if (name=='rtl4') {
    document.location.href = 'http://hbbtv.clipfish.de/index.php?app=dooloop&returnapp=redbutton_rtl';
  } else if (name=='rtl5') {
    document.location.href = 'http://hbbtv.clipfish.de/index.php?app=fitness&returnapp=redbutton_rtl';
  } else if (name=='france1') {
    document.location.href = 'http://hbbtv.francetv.fr/applications/meteo/front/index.xhtml';
  } else if (name=='france2') {
    document.location.href = 'http://hbbtv.francetv.fr/applications/epg/front/hbbtv.xhtml';
  } else if (name=='denmark') {
    document.location.href = 'http://dr.hbb.fokuson.tv/client-portal/hbbtv/drnu/?apptype=lg';
  }
}

//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<?php echo appmgrObject(); ?>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">MIT-xperts HBBTV tests</div>
<div class="txtdiv" style="left: 110px; top: 240px; width: 400px; height: 460px;"><u>Contact / Imprint:</u><br />
MIT-xperts GmbH<br />
Poccistr. 13<br />
80336 Munich, Germany<br />
info &#x40; mit-xperts&#x2e;com<br />
Phone: +49 89 76756380<br /><br />
<u>This project is open source:</u><br />
Contribute and share at<br />https://github.com/mitxp/HbbTV-Testsuite<br /><br />
<u>Talk to us:</u><br />
In case you think a test may need a fix, please contact us (or submit a fix yourself).
</div>

<div id="txtdiv" class="txtdiv" style="left: 650px; top: 110px; width: 450px; height: 600px;"><u>About this testsuite:</u><br />
This test suite is for HbbTV terminal developers to test their implementation of the HbbTV 1.1.1 standard. Although this test suite contains a lot of test, it is not complete. It contains the most important interoperability issues disvocered in current applications. Tested parts are not covered by 100%, but the most importent checks are performed.<br /><br />More information about missing and untested parts can be found at<br />https://github.com/mitxp/HbbTV-Testsuite/wiki/TODOs</div>

<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="czech">Czech</li>
  <li name="ard1">Ard RnD</li>
  <li name="ard2">Ard Partner</li>
  <li name="zdf">ZDF Mediathek</li>
  <li name="ses">SES HD+ Replay</li>
  <li name="ses2">SES HD+ Testsuite</li>
  <li name="rtl1">RTL Clipfish</li>
  <li name="rtl2">RTL Music</li>
  <li name="rtl3">RTL Anime</li>
  <li name="rtl4">RTL Dooloop</li>
  <li name="rtl5">RTL Fitness</li>
  <li name="france1">France television meteo</li>
  <li name="france2">France television programmes tv</li>
  <li name="denmark">Denmark DR TBD</li>
  <li name="exit">Return to test menu</li>
</ul>

</body>
</html>
