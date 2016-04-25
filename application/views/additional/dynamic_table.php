<script>
function fnFormatDetails ( oTable, nTr )

{

    var aData = oTable.fnGetData( nTr );

    var sOut = '<form method="POST" action = "<?php echo current_url(); ?>"><table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';

    sOut += '<tr><td>Employee Designation:</td><td><input type="text" required name="employee_designation" value="'+aData[2]+'" /></td></tr>';

    sOut += '<tr><td>Description:</td><td><input type="text" required name="employee_description" value="'+aData[3]+'" /></td></td></tr>';

    sOut += '<tr><td><input type="hidden" name="id" value="'+aData[1]+'" /></td><td><button type="submit" class="btn-primary btn">Submit</button></td></tr>';

    sOut += '</table></form>';



    return sOut;

}



$(document).ready(function() {



    $('#dynamic-table').dataTable( {

        "aaSorting": [[ 4, "desc" ]]

    } );



    /*

     * Insert a 'details' column to the table

     */

    var nCloneTh = document.createElement( 'th' );

    var nCloneTd = document.createElement( 'td' );

    nCloneTd.innerHTML = '<img src="<?php echo base_url('media'); ?>/img/details_open.png">';

    nCloneTd.className = "center";



    $('#hidden-table-info thead tr').each( function () {

        this.insertBefore( nCloneTh, this.childNodes[0] );

    } );



    $('#hidden-table-info tbody tr').each( function () {

        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );

    } );



    /*

     * Initialse DataTables, with no sorting on the 'details' column

     */

    var oTable = $('#hidden-table-info').dataTable( {

        "aoColumnDefs": [

            { "bSortable": false, "aTargets": [ 0 ] }

        ],

        "aaSorting": [[1, 'asc']]

    });



    /* Add event listener for opening and closing details

     * Note that the indicator for showing which row is open is not controlled by DataTables,

     * rather it is done here

     */

    $('#hidden-table-info tbody td img').click(function () {

        var nTr = $(this).parents('tr')[0];

        if ( oTable.fnIsOpen(nTr) )

        {

            /* This row is already open - close it */

            this.src = "<?php echo base_url('media'); ?>/img/details_open.png";

            oTable.fnClose( nTr );

        }

        else

        {

            /* Open this row */

            this.src = "<?php echo base_url('media'); ?>/img/details_close.png";

            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );

        }

    } );

} );
</script>