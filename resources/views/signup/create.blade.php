@extends('layout.base')
@section('main-container')
<div class="container mx-auto">
    @include('layout.status_message')

    @dump($errors)

        {!! Form::open(array(
            'route' => 'signup.create',
            'method'=>'post',
            'id'=>'signupForm'
            ))
            !!}

        @include('signup.form')

        {!! Form::close() !!}

</div>
@endsection
@push('style')
<style>
	#signupForm {
		width: 670px;
	}
	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	</style>
@endpush
@push('scripts')
<script src="{{url("lib/jquery.js")}}"></script>
<script src="{{url("dist/jquery.validate.js")}}"></script>
<script>
//      $("#signupForm").validate({
//   submitHandler: function(form) {
//     // some other code
//     // maybe disabling submit button
//     // then:
//     $(form).submit();
//   }
//  });
	$().ready(function() {
		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				name: "required",
				email: "required",
                password: "required",
				name: {
					required: true,

				},
                email: {
                    required: true,
                    email: true
                },
				password: {
					required: true,
					minlength: 5
				},
			messages: {
				name: "Please enter your name",
                email: "Please enter a valid email address",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},

			}
        }
		});

	});
	</script>
@endpush


