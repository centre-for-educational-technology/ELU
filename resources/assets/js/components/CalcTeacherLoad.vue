<template id="grid-template">
    <div>
        <h3>{{ trans('project.total') }} <strong>{{ totalPointsSpent }}</strong>{{ trans('project.out_of') }} <strong>{{points}}</strong></h3>
        <h4>{{ trans('project.max_to_one') }}: <strong>{{this.limit_per_one}}</strong></h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th v-for="key in columns">
                        {{ key | capitalize }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="entry in this.data_supervisors">
                    <td>
                        {{entry.name}}
                    </td>
                    <td>
                        <input type="number" class="form-control" v-on:change="calculateValue(entry)" min="0" v-model="entry.points"/>
                    </td>
                </tr>
                <tr v-for="entry in this.data_cosupervisors" class="warning">
                    <td>
                        {{entry.name}}
                    </td>
                    <td>
                        <input type="number" class="form-control" v-on:change="calculateValue(entry)" min="0" v-model="entry.points"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-primary" v-on:click="submit()">
            <i class="fa fa-pencil"></i> {{ trans('project.save_button') }}
        </button>
    </div>
</template>


<script>
    export default {
      props: {
        data_supervisors: Array,
        data_cosupervisors: Array,
        columns: Array,
        points: Number,
        limit_per_one: Number,
        project_id: Number,
      },
      mounted () {

      },
      data: function () {
        var sortOrders = {}
        this.columns.forEach(function (key) {
          sortOrders[key] = 1
        })
        return {
          sortKey: '',
          sortOrders: sortOrders
        }
      },
      computed: {
        totalPointsSpent: function () {
          var sum = 0;
          $.each(this.data_supervisors, function (i, e) {
            sum += Number(e.points);
          });

          if(this.data_cosupervisors.length>0){
            $.each(this.data_cosupervisors, function (i, e) {
              sum += Number(e.points);
            });
          }

          return Math.round(sum * 100) / 100;

        },

      },

      filters: {
        capitalize: function (str) {
          return str.charAt(0).toUpperCase() + str.slice(1)
        }
      },
      methods: {
        sortBy: function (key) {
          this.sortKey = key
          this.sortOrders[key] = this.sortOrders[key] * -1
        },
        calculateValue: function (entry) {
          console.log(entry);
          if( Number(entry.points)<0){
            entry.points = 0;
          }
          else if(Number(entry.points) > this.limit_per_one) {
            entry.points = this.limit_per_one;

            if(this.totalPointsSpent>this.points){
              entry.points = this.points - (this.totalPointsSpent - Number(entry.points));
            }
          }
          else if(this.totalPointsSpent>this.points){
            entry.points = this.points - (this.totalPointsSpent - Number(entry.points));
          }


        },
        submit() {
          console.log(this.project_id);

          var data = {
            'data_supervisors': this.data_supervisors,
            'data_cosupervisors': this.data_cosupervisors,
            'project_id': this.project_id
          };


          this.$http.post(window.Laravel.base_path+'/api/calculate-load/set', data).then(function(data){
            console.log(data);
            swal({
              title: window.Laravel.changes_saved,
              type: "info",
              confirmButtonText: window.Laravel.yes,
              closeOnConfirm: false
            });
          }).catch(function(error){
            swal({
              title: window.Laravel.error,
              type: "error",
              confirmButtonText: window.Laravel.yes,
              closeOnConfirm: false
            });
            console.log('REEEJECTED!');
          });
        },

      }
    }
</script>