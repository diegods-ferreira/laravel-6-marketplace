@extends('layouts.front')

@section('content')

    <div class="container">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dados para Pagamento</h2>
                    <hr>
                </div>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="card_number">Número do Cartão</label>
                        <input type="text" class="form-control" name="card_number" id="card_number">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="card_month">Mês de Expiração</label>
                        <input type="text" class="form-control" name="card_month" id="card_month">
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="card_year">Ano de Expiração</label>
                        <input type="text" class="form-control" name="card_year" id="card_year">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 form-group">
                        <label for="card_cvv">Código de Segurança</label>
                        <input type="text" class="form-control" name="card_cvv" id="card_cvv">
                    </div>
                </div>

                <button class="btn btn-success btn-lg">Efetuar Pagamento</button>
            </form>
        </div>
    </div>

@endsection