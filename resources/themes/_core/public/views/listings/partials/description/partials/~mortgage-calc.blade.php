<div id="listing-details-description-mortgage-calc" class="sub-subsection last">
    <!-- Modal button -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mortgage-calculator-modal">Mortgage Calculator</button>
    <!-- Modal -->
    <div id="mortgage-calculator-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Mortgage Calculator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mortage-calculator-modal-label">Mortgage Calculator</h4>
                </div>
                <div class="modal-body">
                    <form id="mortage-calculator-form">
                        <div class="form-group">
                            <label for="mc-interest-rate">Interest Rate</label>
                            <input class="form-control" type="number" id="mc-interest-rate" name="mc-interest-rate" value="3.50">
                        </div>
                        <div class="form-group">
                            <label for="mc-loan-maount">Loan Amount</label>
                            <input class="form-control" type="number" id="mc-loan-amount" name="mc-loan-amount" value="{{ $listing->price }}">
                        </div>
                        <div class="form-group">
                            <label for="mc-years">Years</label>
                            <input class="form-control" type="number" id="mc-years" name="mc-years" value="30">
                        </div>
                        <div class="form-group">
                            <label for="mc-payment">Payment</label>
                            <input class="form-control" type="number" id="mc-payment" name="mc-payment" min="0.01" step="0.01" value="1032.80">
                        </div>
                        <div class="form-group button-form-group last">
                            <br>
                            <input type="button" class="calculate btn btn-primary btn-block btn-lg" value="Calculate">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>