// function checkCookie(cookieName, params) {
//     var cookie = getCookie(cookieName);
//     if (cookie != "") {
//       alert("Welcome again " + user);
//     } else {
//       user = prompt("Please enter your name:", "");
//       if (cookie != "" && cookie != null) {
//         setCookie(cookieName, params);
//       }
//     }
// }

// function setCookie(cookieName, cvalue, exdays) {
//     var cookieContent = cookieName + "=" + cvalue + ";" 
//     if(exdays) {
//         var d = new Date();
//         d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//         var expires = "expires="+d.toUTCString();
    
//         document.cookie = cookieContent;
//         cookieContent = cookieContent.concat(expires + ";path=/");
//     }

//     document.cookie = cookieContent;    
// }
  
// function getCookie(cookieName) {
//     var name = cookieName + "=";
//     var ca = document.cookie.split(';');
//     for(var i = 0; i < ca.length; i++) {
//       var c = ca[i];
//       while (c.charAt(0) == ' ') {
//         c = c.substring(1);
//       }
//       if (c.indexOf(name) == 0) {
//         return c.substring(name.length, c.length);
//       }
//     }
//     return "";
// }