<h1>位置情報取得サンプル</h1>
<button onclick="getPosition();">位置情報を取得する</button>

<div id="maps" style="height: 400px"></div>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAJL_P3a4hhqidZggmUA9dMiJsaRXPT-bA&callback=initMap" async></script>

<script>

  if (navigator.geolocation) {
    // Geolocation APIに対応している
    alert("この端末では位置情報が取得できます");
  } else {
    // Geolocation APIに対応していない
    alert("この端末では位置情報が取得できません");
  }

  function getPosition() {
    // 現在地を取得
    navigator.geolocation.getCurrentPosition(
      // 取得成功した場合
      function(position) {
          alert("緯度:"+position.coords.latitude+",経度"+position.coords.longitude);
      },
      // 取得失敗した場合
      function(error) {
        switch(error.code) {
          case 1: //PERMISSION_DENIED
            alert("位置情報の利用が許可されていません");
            break;
          case 2: //POSITION_UNAVAILABLE
            alert("現在位置が取得できませんでした");
            break;
          case 3: //TIMEOUT
            alert("タイムアウトになりました");
            break;
          default:
            alert("その他のエラー(エラーコード:"+error.code+")");
            break;
        }
      }
    );
  }

  function initMap() {
    var mapPosition = {lat: 34, lng: 135};
    var mapArea = document.getElementById('maps');
    var mapOptions = {
      center: mapPosition,
      zoom: 16
    };

    var map = new google.maps.Map(mapArea, mapOptions);
  }
</script>