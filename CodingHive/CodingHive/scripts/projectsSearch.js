//var baseUrl = '<?php echo base_url(); ?>';
$(function(){
    $('.searchFor').click(function(e){
        e.stopPropagation();
        $(this).find('.searchDropdown').stop();
        $(this).find('.searchDropdown').slideToggle('fast');
    });


    $('.searchDropdown div').click(function(e){
        var that = this;


        $(this).find('.searchDropdown').stop();
        $(this).find('.searchDropdown').hide();
        $(this).parent().parent().find('.searchForLabel').html(that.innerText
            + "<img class='searchDropdownArrow' src='images/search_dropdown_arrow.png' />");



    });

    $('.searchForDropdown div').click(function(e){
        $('.searchCriteria').hide();
        if(this.innerText === 'Projects') {
            $('.searchCriteria').show();
            $('.projectCriteria').show();
            $('.peopleCriteria').hide();
        } else if(this.innerText === 'People') {
            $('.searchCriteria').show();
            $('.peopleCriteria').show();
            $('.projectCriteria').hide();
        }
    });
});