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

{{-- <script>
   document.getElementById('reportForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn việc gửi form theo cách thông thường

    var reportReason = document.getElementById('reportReason').value;
    var dishId = document.querySelector('input[name="dish_id"]').value;

    var formData = new FormData();
    formData.append('reason', reportReason);
    formData.append('dish_id', dishId);

    fetch('{{ route('report.store') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Kiểm tra phản hồi
        if (data.success) {
            alert('Báo cáo của bạn đã được gửi thành công.');
            $('#myModal').modal('hide'); // Đóng modal sau khi gửi thành công
        } else {
            alert('Có lỗi xảy ra, vui lòng thử lại: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra, vui lòng thử lại.');
    });
});
</script> --}}
