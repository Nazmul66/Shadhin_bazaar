<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;  // By Default false but make this true
        return true; // Set to true to allow all authorized users
    }


    public function rules(): array
    {
        $discountType = $this->input('discount_type'); // Access input directly
        $id = $this->route('coupon');

        return [
            'name'          => ['required', 'unique:coupons,name,' . $id, 'max:155'],
            'code'          => ['required', 'max:155'],
            'quantity'      => ['required', 'integer', 'min:0'],
            'max_used'      => ['required', 'integer', 'min:0'],
            'discount_type' => ['required', 'in:percent,amount'],
            'discount'      => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($discountType) {
                    if ($discountType === 'percent' && ($value < 1 || $value > 100)) {
                        $fail('The discount must be between 1 and 100 when the discount type is percent.');
                    }
                },
            ],            
            'start_date' => ['required', 'date'],
            'end_date'   => ['required', 'date'],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'          => 'Coupon Name is required',
            'name.unique'            => 'Coupon Name must be unique',
            'code.required'          => 'Coupon code is required',
            'max_used.required'      => 'Max Used is required',
            'discount.required'      => 'Discount is required',
            'start_date.required'    => 'Start Date is required',
            'end_date.required'      => 'End Date is required',
            'discount_type.required' => 'Discount Type is required',
            'discount_type.in'       => 'Discount Type must be either percentage or amount',
        ];
    }
}
