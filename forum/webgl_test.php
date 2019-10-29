<script>
var canvas = document.createElement('canvas');
var webglContextParams = ['webgl', 'experimental-webgl', 'webkit-3d', 'moz-webgl'];
var webglContext = null;
for (var index = 0; index < webglContextParams.length; index++) {
  try {
    webglContext = canvas.getContext(webglContextParams[index]);
    if(webglContext) {
      //breaking as we got our context
      break;
    }
  } catch (E) {
    console.log(E);
  }
}
if(webglContext === null) {
  document.cookie="webgl=0";
} else {
  document.cookie="webgl=1";
}
</script>