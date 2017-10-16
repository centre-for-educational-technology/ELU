<template id="grid-template">
    <div>
        <h4>Total: <strong>{{ totalPointsSpent }} out of {{points}} points</strong></h4>
        <table>
            <thead>
            <tr>
                <th v-for="key in columns"
                    @click="sortBy(key)"
                    :class="{ active: sortKey == key }">
                    {{ key | capitalize }}
                    <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="entry in this.data">
                <td>
                    {{entry.id}}
                </td>
                <td>
                    {{entry.name}}
                </td>
                <td>
                    <input type="number" class="form-control" v-on:change="doStuff(entry)" min="0" v-model="entry.points"/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
    export default {
      props: {
        data: Array,
        columns: Array,
        points: Number,
        limit_per_one: Number,
      },
      mounted () {
        // Do something useful with the data in the template
        console.dir(this.limit_per_one)
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
          $.each(this.data, function (i, e) {
            sum += Number(e.points);
          });

          return sum;

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
        doStuff: function (entry) {
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


        }

      }
    }
</script>