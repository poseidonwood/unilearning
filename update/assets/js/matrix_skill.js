var myConfig = {
  type: 'radar',
  plot: {
    aspect: 'area',
    animation: {
      effect: 3,
      sequence: 1,
      speed: 700
    }
  },
  scaleV: {
    values: "1:5:1",
    item: { //To style your scale labels.
      'font-color': "black",
      'font-family': "Georgia",
      'font-size':12,
      'font-weight': "bold",
      'font-style': "italic"
    },
    'ref-line': { //Axis Line
      'line-color': "black",
      'line-width':5
    },
    tick: { //Tick Marks
      'line-color': "black",
      'line-width':3,
      size:15,
      placement: "cross"
    }
    // visible: false
  },
  scaleK: {
    values: '0:29:1',
    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],    
    item: {
      fontColor: '#607D8B',
      backgroundColor: "white",
      borderColor: "blue",
      borderWidth: 3,
      padding: '5 10',
      borderRadius: 10
    },
    refLine: {
      lineColor: '#c10000'
    },
    tick: {
      lineColor: '#59869c',
      lineWidth: 2,
      lineStyle: 'dotted',
      size: 20
    },
    guide: {
      lineColor: "#607D8B",
      lineStyle: 'solid',
      alpha: 0.3
      
    }
  },
  series: [{
        labels: "Aktual",
      values: [4, 4, 4, 4, 4, 4, 3, 2, 2, 3, 3, 3, 3, 2, 3, 2, 3, 2, 4, 4, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
      text: 'farm'      ,
      lineColor: 'green',
      backgroundColor: 'green',
      marker: {
        type: "circle",
        'background-color': "white",
        'border-color': "green"
      }
    },
    {
        labels: "Target",
      values: [4, 4, 4, 5, 5, 5, 4, 4, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
      lineColor: 'yellow',
      backgroundColor: 'yellow',
      marker: {
        type: "circle",
        'background-color': "white",
        'border-color': "yellow"
      }
    }
  ]
};
 
zingchart.render({
  id: 'matrix_skill',
  data: myConfig,
  height: '100%',
  width: '100%'
});