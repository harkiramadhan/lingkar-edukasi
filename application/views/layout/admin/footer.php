
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
                </div>
            </div>

        </div>
        
        <script src="<?= base_url('assets/admin/vendor/global/global.min.js')?>"></script>
        <script src="<?= base_url('assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')?>"></script>
        <script src="<?= base_url('assets/admin/vendor/chart.js/Chart.bundle.min.js')?>"></script>
        <script src="<?= base_url('assets/admin/js/custom.min.js')?>"></script>
        <script src="<?= base_url('assets/admin/js/deznav-init.js')?>"></script>
        <script src="<?= base_url('assets/admin/vendor/owl-carousel/owl.carousel.js')?>"></script>
        
        <!-- Chart piety plugin files -->
        <script src="<?= base_url('assets/admin/vendor/peity/jquery.peity.min.js')?>"></script>
        
        <!-- Apex Chart -->
        <script src="<?= base_url('assets/admin/vendor/apexchart/apexchart.js')?>"></script>
        
        <!-- Dashboard 1 -->
        <script src="<?= base_url('assets/admin/js/dashboard/dashboard-1.js')?>"></script>

        <!-- Datatable -->
        <script src="<?= base_url('assets/admin/vendor/datatables/js/jquery.dataTables.min.js') ?>"></script>
        
        <script>
            function carouselReview(){
                /*  event-bx one function by = owl.carousel.js */
                jQuery('.event-bx').owlCarousel({
                    loop:true,
                    margin:30,
                    nav:true,
                    center:true,
                    autoplaySpeed: 3000,
                    navSpeed: 3000,
                    paginationSpeed: 3000,
                    slideSpeed: 3000,
                    smartSpeed: 3000,
                    autoplay: false,
                    navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
                    dots:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        720:{
                            items:2
                        },
                        
                        1150:{
                            items:3
                        },			
                        
                        1200:{
                            items:2
                        },
                        1749:{
                            items:3
                        }
                    }
                })			
            }
            jQuery(window).on('load',function(){
                setTimeout(function(){
                    carouselReview();
                }, 1000); 
            });
        </script>

        <script>
            (function($) {
                var table = $('#example2').DataTable({
                    searching: true,
                    paging:true,
                    select: true,
                    info: true,         
                    lengthChange:true 
                    
                });
                $('#example tbody').on('click', 'tr', function () {
                    var data = table.row( this ).data();
                    
                });
            })(jQuery);
	    </script>
    </body>
</html>