<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
require("validate.php");
sendContentType();
openDocument();

$uagent = $_SERVER['HTTP_USER_AGENT'];

?>
<script type="text/javascript">
//<![CDATA[

window.onload = function() {
  menuInit();
  registerKeyEventListener();
  initApp();
  setInstr('Please run all steps in the displayed order. Navigate to the test using up/down, then press OK to start the test.');
}
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
  setInstr('Executing step...');
  showStatus(true, '');
  if (name=='czech') {
    document.location.href = 'http://hbbtv.ceskatelevize.cz/ivyisilani/';
  } else if (name=='vidplayer') {
    document.location.href = 'http://hbbtv.ardmediathek.de/hbbtv-ard/mediathek/?devicegroup=hbbtv&context=hbbtv';
  }
}
//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<object id="video" type="video/mp4" style="position: absolute; left: 100px; top: 480px; width: 320px; height: 180px;"></object>
<?php echo appmgrObject(); ?>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">MIT-xperts HBBTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="czech">Czech</li>
  <li name="vidplayer">Test 2: Check video player user agent</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
