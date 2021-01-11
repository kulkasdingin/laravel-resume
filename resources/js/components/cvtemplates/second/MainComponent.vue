<template>
<body>

	<!-- Introduction -->
	<div class="intro section" id="about">
		<div class="container">
			<p>Hi!, i'm a {{ cv.profession }}</p>
			<div class="col-8 offset-2 text-center custom-col-image-wrapper custom-wrapper-1x1 p-0">
				<template v-if="cv.photo">
					<img id="profile-image" class="mx-auto img-circle custom-image-wrapped border-secondary p-1"
						v-bind:src="'/storage/'+cv.photo"
						alt="User profile picture"
						style="border: 3px solid; transition: border-radius .3s ease">
				</template>
				<template v-else>
					<img id="profile-image" class="mx-auto img-circle custom-image-wrapped border-secondary p-1"
						v-bind:src="'https://img.icons8.com/carbon-copy/100/000000/no-image.png'"
						alt="User profile picture"
						style="border: 3px solid; transition: border-radius .3s ease">
				</template>
			</div>
			<div class="row">
				<div class="col-8">
					<h1>{{ cv.first_name }} {{cv.last_name}}</h1>
				</div>
			</div>
			<p>{{ cv.phone }} - {{ cv.email }}</p>
			<p>{{ cv.description }}</p>
		</div>
	</div>

	<div class="cfield section second">
		<div class="container">
			<div v-for="custom_field_categories in cv.custom_field_categories" v-bind:key="custom_field_categories.id">
				<div>
					<h1>{{custom_field_categories.nama}}</h1>
				</div><!--// .yui-u -->
				<ul class="cfield-list list-flat">
					<li v-for="custom_field_records in custom_field_categories.custom_field_records" v-bind:key="custom_field_records.id">
						<div v-for="(custom_field_record_attribute_line_values,index) in custom_field_records.custom_field_record_attribute_line_values" v-bind:key="custom_field_record_attribute_line_values.id">
								{{custom_field_categories.custom_field_attribute_lines[index].nama}} : {{custom_field_record_attribute_line_values.value}}
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="units-row">
				<div class="unit-50">
					<p>Made by {{cv.first_name}} {{cv.last_name}} using template by Afnizar Nur Ghifari</p>
				</div>
			</div>
		</div>
	</footer>

</body>
</template>

<script>
    export default {
        data(){
            return{
				cv: {},
				cvDataLoaded: false,
                uri: '/admin/resource/cvs'
            }
        },
        methods: {
            cvInit(){
            },
            putAsyncData(data){
				this.cv = data;
				this.cvDataLoaded = true;
            },
            loadData(){
				var id = window.location.href.split('/').pop();
                axios.get(this.uri + "/" + id)
                .then(response=>{
                    let self = this
                    $.when(this.putAsyncData(response.data.cv)).then(function(){
						self.cvInit();
						console.log(response.data.cv)
                    });
                });
            },
        },
        mounted() {
            this.loadData();
			console.log('Component mounted.');
        }
    }
</script>
