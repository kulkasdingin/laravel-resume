<template>
<body>

	<!-- Introduction -->
	<div class="intro section" id="about">
		<div class="container">
			<p>Hi!, i'm a {{ cv.profession }}</p>
			<div class="units-row units-split wrap">
				<div class="unit-1000">
					<h1>{{ cv.first_name }} {{cv.last_name}}</h1>
				</div>
				<p>{{ cv.phone }} - {{ cv.email }}</p>
			</div>
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
