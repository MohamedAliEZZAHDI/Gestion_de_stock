<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <h4>G<span>S</span></h4>
                    </a>
                    <!-- ***** Menu Start ***** -->
                @include('nav')
                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->


<main style="margin-top: 90px">

    <div class="container">
        <br />
        <h3 align="center">Fabrication PF</h3>
        <br />
        <div align="right">
            <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
        </div>
        <br />
        <table id="stock_table" class="table table-bordered table table-striped table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Code_PF</th>
                <th>Quantite</th>
            </tr>
            </thead>
        </table>
    </div>

</main>
<div id="stockModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="stock_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code_PF" id="first_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantite" id="last_name" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#stock_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('ajaxdata.getdata') }}",
            "columns":[
                { "data": "code_PF" },
                { "data": "quantite" },
            ]
        });



        $('#add_data').click(function(){
            $('#stockModal').modal('show');
            $('#stock_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
            $('.modal-title').text('Add Data');
        });


        $('#stock_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{ route('ajaxdata.postdata') }}",
                method:"POST",
                data:form_data,
                dataType:"json",
                success:function(data)
                {

                    if(data.error.length > 0)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                        $('#stock_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Data');
                        $('#button_action').val('insert');
                        $('#stock_table').DataTable().ajax.reload();
                    }
                }
            })
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr("id");
            $('#form_output').html('');


            $.ajax({
                url:"{{route('ajaxdata.fetchdata')}}",

                method:'get',
                data:{id:id},
                dataType:'json',

                success:function(data)
                {

                    console.log(data)

                    $('#code').val(data.code);
                    $('#stock').val(data.stock);
                    $('#id').val(id);
                    $('#stockModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Data');
                    $('#button_action').val('update');
                }
            })
        });

    });


</script>

</body>
</html>
