var re = {
  show : function () {
  // re.show () : show the total number of likes and dislikes

    // DATA
    var data = new FormData();
    data.append('req', 'total');
    data.append('id_discussion', document.getElementById("id_discussion").value);

    // AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "reaction_ajax.php", true);
    xhr.onload = function () {
      // SET TOTAL COUNT
      var res = JSON.parse(this.response);
      document.getElementById("react-count-up").innerHTML = res.msg[1] ? res.msg[1] : 0;
      document.getElementById("react-count-down").innerHTML = res.msg[0] ? res.msg[0] : 0;

      // SET LIKE/DISLIKE HIGHLIGHT
      var up = document.getElementById("react-up"),
          down = document.getElementById("react-down");
      up.classList.remove("set");
      down.classList.remove("set");
      if (res.msg['u']==1) {
        up.classList.add("set");
      } else if (res.msg['u']==0) {
        down.classList.add("set");
      }
    };
    xhr.send(data);
  },

  update : function (react) {
  // re.update () : update post reaction
  // PARAM react : 1 for like, 0 for dislike

    // DATA
    var data = new FormData();
    data.append('req', 'update');
    data.append('id_discussion', document.getElementById("id_discussion").value);
    data.append('react', react);

    // AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "reaction_ajax.php", true);
    xhr.onload = function () {
      var res = JSON.parse(this.response);
      // OK - UPDATE LIKES
      if (res.status==1) {
        re.show();
      }
      // ERROR
      else {
        alert(res.msg);
      }
    };
    xhr.send(data);
  }
};

// INIT ON PAGE LOAD
window.addEventListener("load", function () {
  // ADD ONCLICK ACTIONS
  document.getElementById("react-up").addEventListener("click", function(){
    re.update(1);
  });
  document.getElementById("react-down").addEventListener("click", function(){
    re.update(0);
  });
  // SHOW TOTAL LIKES & DISLIKES
  re.show();
});