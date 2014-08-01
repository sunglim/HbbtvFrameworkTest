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
  setInstr('Please run all steps in the displayed order. Navigate to the test using up/down, then press OK to start the test. Displayed data must be verified manually, as configured preferences are unknown to this test.');
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
  setInstr('Executing step...');
  showStatus(true, '');
  var lgappmgr = document.getElementById('lgobj').applicationManager;
  if (!lgappmgr) {
    showStatus(false, 'Cannot find application/LgApplicationManager');
    return;
  }
  var result;
  var attrib;
  var valid = false;
  try {
    if (name=='launch') {
      attrib = 'launch';
      lgappmgr.launch("youtube.leanback.v4", function(success, errorCode, errorText) {
        if (success) {
          showStatus(true, "Success to launch errorCode : " + errorCode + " errorText : " + errorText);
        } else {
          showStatus(false, "Fail to launch errorCode : " + errorCode + " errorText : " + errorText);
        }
      });
    } else if (name=='launchfail') {
      attrib = 'launchfail';
      lgappmgr.launch("com.webos.app.discoverywrong", function(success, errorCode, errorText) {
        if (success) {
          showStatus(true, "Success to launch errorCode : " + errorCode + " errorText : " + errorText);
        } else {
          showStatus(false, "Fail to launch errorCode : " + errorCode + " errorText : " + errorText);
        }
      });
    } else if (name=='deeplaunch') {
      attrib = 'deeplaunch';
      lgappmgr.launch("com.webos.app.discovery", "category/GAME_APPS/com.webos.app.example", function(success, errorCode, errorText) {
        if (success) {
          showStatus(true, "success to launch");
        } else {
          showStatus(false, "Fail to launch errorCode : " + errorCode + " errorText : " + errorText);
        }
      });
    } else if (name=='deeplaunchfail') {
      attrib = 'deeplaunchfail';
      lgappmgr.launch("com.webos.app.discoverywrong", "category/GAME_APPS/com.webos.app.example", function(success, errorCode, errorText) {
        if (success) {
          showStatus(true, "success to launch");
        } else {
          showStatus(false, "Fail to launch errorCode : " + errorCode + " errorText : " + errorText);
        }
      });
    } else if (name=='getAppInfoFail') {
      attrib = 'getAppInfoFail';
      lgappmgr.getAppInfo("com.webos.app.memberships", function(result, errox) {
        showStatus(false, "success to calL" + errox);
      });
    } else if (name=='getAppInfo') {
      attrib = 'getAppInfo';
      lgappmgr.getAppInfo("com.webos.app.discovery", function(result) {
        showStatus(true, "success to launch");
      });
    } else {
      showStatus(false, 'Unknown test name '+name);
      return;
    }
  } catch (e) {
    showStatus(false, 'Error while accessing '+attrib+' attribute');
  }
}
function validateLanguageList(txt) {
  txt = txt.toUpperCase();
  if (!txt) return false;
  while (txt) {
    if (txt.length<3) {
      return false;
    }
    for (var i=0; i<3; i++) {
      var c = txt.charCodeAt(i);
      if (c<0x41 || c>0x5a) return false;
    }
    txt = txt.substring(3);
    if (txt.length>0) {
      if (txt.substring(0, 1)!=',') return false;
      txt = txt.substring(1);
    }
  }
  return true;
}
//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<?php echo appmgrObject(); ?>

<object id="lgobj" type="application/vnd.lge.hbbtv"></object>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">MIT-xperts HBBTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="launch">Launch</li>
  <li name="launchfail">Launch - wrong link</li>
  <li name="deeplaunch">Deep Launch</li>
  <li name="deeplaunchfail">Deep Launch - wrong link</li>
  <li name="getAppInfo">getAppInfo</li>
  <li name="getAppInfoFail">getAppInfo - wrong id</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 300px; width: 400px; height: 400px;"></div>

</body>
</html>
