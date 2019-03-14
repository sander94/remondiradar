

            {!! Form::select('region', $regionsArray, $region, ['id' => 'search', 'placeholder' => 'Vali piirkond']); !!}

                <script>
                    $(document).ready(function(){
                        $('#search').selectize();
                    });   
                </script>