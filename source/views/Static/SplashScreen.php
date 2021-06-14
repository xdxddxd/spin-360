
  <meta charset = "utf-8">

<style type="text/css">
* {box-sizing: border-box;}
splash {
 margin: 0;
 padding: 0;
 font-family: Avnir Roman;
 z-index: 16777271;
}

.preload{
 width: 100%;
 height: 100%;
 background: white;
 position: fixed;
 top: 0;
 left: 0;
 z-index: 16777271;
}
.logo {
 max-width: 80vw;
 margin: 80px auto 50px auto;
 font-size: 50px;
 text-shadow: -1px 2px 2px #000;
 text-align: center;
 color: azure;
}
.loader-frame {
 width: 70px;
 height: 70px;
 margin: auto;
 position: relative;
}
.loader1, .loader2 {
 position: absolute;
 border: 5px solid transparent;
 border-radius: 50%;
}
.loader1 {
 width: 70px;
 height: 70px;
 border-top: 5px solid linear-gradient(to top, transparent, rgba(0, 0, 0, 0.2)),  linear-gradient(to right, red,orange,yellow,teal,purple,red);
 border-bottom: 5px solid linear-gradient(to top, transparent, rgba(0, 0, 0, 0.2)),  linear-gradient(to right, red,orange,yellow,teal,purple,red);
 animation: clockwisespin 2s linear 3;

 background-image: linear-gradient(to top, transparent, rgba(0, 0, 0, 0.2)),  linear-gradient(to right, red,orange,yellow,teal,purple,red);
  background-size: 100% 100%, 2000% 100%;
}
.loader2 {
 width: 60px;
 height: 60px;
 border-left: 5px solid linear-gradient(to top, transparent, rgba(0, 0, 0, 0.2)),  linear-gradient(to right, red,orange,yellow,teal,purple,red);
 border-right: 5px solid linear-gradient(to top, transparent, rgba(0, 0, 0, 0.2)),  linear-gradient(to right, red,orange,yellow,teal,purple,red);
 top: 5px; left: 5px;
 animation: anticlockwisespin 2s linear 3;

 background-image: linear-gradient(to top, transparent, rgba(0, 0, 0, 0.2)),  linear-gradient(to right, red,orange,yellow,teal,purple,red);
  background-size: 100% 100%, 2000% 100%;
}
.loader-static {
 width: 50px;
 top: 15px; left: 15px;
 margin-top: 10px;
 margin-left: 15px;

}


@keyframes clockwisespin {
 from {transform: rotate(0deg);background-position: center center, left center;}
 to {transform: rotate(360deg);background-position: center center, right center;}
}
@keyframes anticlockwisespin {
 from {transform: rotate(0deg);background-position: center center, left center;}
 to {transform: rotate(-360deg);background-position: center center, right center;}
}
@keyframes fadeout {
 from {opacity: 1;}
 to {opacity: 0;}
}
    </style>

    <splash>

 <div class = "preload" id = "preload">
  <div class ="logo">
   <img src="<?php echo URL_BASE; ?>/assets/Icons/favicon.png" alt="Spin360 Carview" class="logo">
  </div>
   <div class = "loader-frame">
    <div class = "loader1" id = "loader1"></div>
    <div class = "loader2" id = "loader2"></div>
    <!--img src="<?php echo URL_BASE; ?>/assets/img/Logo.png" class="loader-static"-->
   </div>
 </div>

<script type="text/javascript">

(function(){
 
 var preload = document.getElementById("preload");
 var loading = 0;
 var id = setInterval(frame, 64);

 function frame(){
  if(loading >= 100) {
   clearInterval(id);
   preload.style.zIndex = "-1";
   preload.style.opacity = "0";
   //window.open("Splash%20Screen.html", "_self");
  }
  else {
   loading = loading + 1;
   if(loading == 90) {
    preload.style.animation = "fadeout 1s ease";
   }
  }
 }

 window.onload = loading = 90;


})();


    </script>

</splash>