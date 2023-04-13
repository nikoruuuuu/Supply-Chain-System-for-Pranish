<style>
  .user-img{
      position: absolute;
      height: 27px;
      width: 27px;
      object-fit: cover;
      left: -7%;
      top: -12%;
  }
  .user-dd:hover{
    color:#fff !important
  }
</style>
<nav class="main-header navbar navbar-expand-lg navbar-dark bg-gradient-primary">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="./">
                <img src="https://scontent.fmnl3-2.fna.fbcdn.net/v/t39.30808-6/278855375_103447009018034_9029174057705894185_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeEdY_JiM3_ev9eZ-7aCoSmGnpXFmEilpiCelcWYSKWmIN70csrX6chBAX9jsDaQ64u1LOpvnUupOJnyeFrJmWJf&_nc_ohc=qnL94BOxiKQAX-YZlz5&_nc_ht=scontent.fmnl3-2.fna&oh=00_AfCFeev2RCPsNku_VZh80xqWV-W_k0ajclm6ZoK4NS83Sg&oe=64195B07" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="./?p=class">Class List</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="./?p=instructors">Instructors</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="./?p=about">About</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="./?p=contact">Contact Us</a></li>
                     
                    </ul>
                    <div class="d-flex align-items-center">
                        <a class="font-weight-bolder text-light mx-2 text-decoration-none" href="./admin">Admin Panel</a>
                    </div>
                </div>
            </div>
        </nav>
<script>
  $(function(){
    $('#search_report').click(function(){
      uni_modal("Search Request Report","report/search.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>