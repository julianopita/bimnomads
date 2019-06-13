     function insert_like_discussion()
    {
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_like_discussion:"like"
      },
      success: function (response) {
        $('#totalvotes').slideDown()
        {     
          $('#totalvotes').html(response);
        }
      }
      });
    }

    function insert_dislike_discussion()
    {
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_dislike_discussion:"dislike", $_SESSION['id_discussion']
      },
      success: function (response) {
        $('#totalvotes').slideDown()
        {     
          $('#totalvotes').html(response);
        }
      }
      });
    }

     function insert_like_comment()
    {
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_like_comment:"like"
      },
      success: function (response) {
        $('#totalvotes').slideDown()
        {     
          $('#totalvotes').html(response);
        }
      }
      });
    }

    function insert_dislike_comment()
    {
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_dislike_comment:"dislike"
      },
      success: function (response) {
        $('#totalvotes').slideDown()
        {     
          $('#totalvotes').html(response);
        }
      }
      });
    }