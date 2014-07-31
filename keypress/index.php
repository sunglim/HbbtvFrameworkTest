<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

?>
<script type="text/javascript">
//<![CDATA[
var logtxt = 'Please press the VK_LEFT key on your remote control.';
var state = 0;

window.onload = function() {
  menuInit();
  registerKeyEventListener();
  document.addEventListener("keypress", function(e) {
    handleKeyPress(e.keyCode);
  }, false);
  document.addEventListener("keyup", function(e) {
    handleKeyUp(e.keyCode);
  }, false);
  initApp();
  setInstr(logtxt);
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
  } else if (kc==VK_LEFT) {
    logtxt += '<br />Keydown was sent.';
    state = 1;
    setInstr(logtxt);
  }
  return false;
}
function handleKeyPress(kc) {
  if (kc==VK_LEFT) {
    logtxt += '<br />Keypress was sent.';
    if (state==1) {
      state = 2;
    }
    setInstr(logtxt);
  }
}
function handleKeyUp(kc) {
  if (kc==VK_LEFT) {
    logtxt += '<br />Keyup was sent.';
    if (state==2) {
      state = 3;
    }
    if (state==3) {
      showStatus(true, 'All key events were received correctly.');
    } else if (state==1) {
      showStatus(false, 'Key events were not sent correctly: keypress event was missing (see OIPF DAE Annex B CE-HTML Profiling).');
    } else {
      showStatus(false, 'Key events were not sent correctly: we need 1. keydown, 2. keypress, and 3. keyup.');
    }
    setInstr(logtxt);
  }
}
function runStep(name) {
}

//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<?php echo appmgrObject(); ?>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">MIT-xperts HBBTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="exit">Return to test menu</li>
</ul>

<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
