<!-- Core JavaScript
================================================== -->
<script src="/web/js/jquery.min.js"></script>
<script src="/web/js/tether.min.js"></script>
<script src="/web/js/bootstrap.min.js"></script>
<script src="/web/js/custom.js"></script>
<script type="text/javascript" language="javascript" src="/web/ckeditor/ckeditor.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
@yield('script')   
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingElements = document.querySelectorAll('#rating span');
        const ratingValueInput = document.getElementById('rating-value');
        
        ratingElements.forEach(span => {
            span.addEventListener('mouseover', function() {
                const value = this.getAttribute('data-value');
                updateStars(value, 'hover');
            });
            
            span.addEventListener('mouseout', function() {
                const currentRating = ratingValueInput.value;
                updateStars(currentRating, 'selected');
            });
            
            span.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                ratingValueInput.value = value;
                updateStars(value, 'selected');
            });
        });
        
        function updateStars(value, className) {
            ratingElements.forEach(span => {
                if (span.getAttribute('data-value') <= value) {
                    span.classList.add(className);
                } else {
                    span.classList.remove(className);
                }
            });
        }
    });

    
</script>
<script>
    
    let mybutton = document.getElementById("myBtn");
    
   
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>