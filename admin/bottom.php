<footer>
        <div class="col-1 col-6 col-12 ">
            <center>
                <h4>&copy; 2022 Digital Voting System. All Rights Reserved</h4>
            </center>
        </div>
    </footer>
    <script type="text/javascript" src="css/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="css/bootstrap-5.1.3-dist/js/popper.min.js.map.js"></script>
    <script src="js/jquery-1.2.6.min.js"></script>
    <script>
    $(document).ready(function(){
      
        $('#email').blur(function(event){
         
            event.preventDefault();
            var emailId=$('#email').val();
                                $.ajax({                     
                            url:'checkuser.php',
                            method:'post',
                            data:{email:emailId},  
                            dataType:'html',
                            success:function(message)
                            {
                            $('#result').html(message);
                            }
                      });
                    
           

        });

    });
   
    </script>
</body>

</html>