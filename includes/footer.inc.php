</div> <!-- / end #content -->
</div>
</div>
<footer id="footer" class="q30-footer">
    <div class="q30-container-980">
        <span class="q30-copyright">Copyright &copy; <?php echo date('Y'); ?> q30 Design. All Rights Reserved.</span>
    </div>
</footer>
<?php
if(!$detect->isMobile() || $detect->isTablet()):
?>
<script type="text/javascript">
$(document).ready(function(){
    $(".skip").click(function(event){
        var skipTo = "#" + this.href.split('#')[1];
        $(skipTo).attr('tabindex', -1).on('blur focusout', function(){
            $(this).removeAttr('tabindex');
        }).focus();
    });
});
$(window).load(function(){
    $("#footer").q30_footer();
});
</script>
<?php
endif;
?>
</body>
</html>