const isAllOjectContentSame = (arr) => {
  const temp = arr[0].textContent;
  if (!temp) {
    return false;
  }
  return arr.every(ele => {
    return ele.textContent === temp;
  });
}

const easyBot = (table, mark) => {
  let emptyArr = [];
  console.log(table);
  console.log(mark);
  table.forEach(row => {
    const tempArr = row.filter(item => !item.textContent);
    emptyArr = emptyArr.concat(tempArr);
  });

  const rand = Math.floor(Math.random()*emptyArr.length);

  if (emptyArr.length != 0) {
    emptyArr[rand].textContent = mark;
  }
}

const upgradeBot = (table, mark) => {

  /*
  * Return if two objects in the array have the same textContent, if yes return the textContent, if not return false
  * @return {string}
  */
  const findTwoSameInArr = (arr) => {
    let flag = false;
    // Test if it is an empty row
    if (isAllOjectContentSame(arr)) {
      return false;
    }
    // Test if the array has been filled up already
    const tempArr = arr.filter(item => !item.textContent);
    if (tempArr.length === 0) {
      return false;
    }
    // Sort the arr of objects by comparing the textContent of object
    const sortedArr = arr.slice().sort((obj1, obj2) => {
      return (obj1.textContent<obj2.textContent?-1:(obj1.textContent>obj2.textContent?1:0));
    });
    for (let i = 0; i < sortedArr.length - 1; i++) {
      if (sortedArr[i + 1].textContent === sortedArr[i].textContent && sortedArr[i].textContent) {
        flag = sortedArr[i].textContent;
      }
    }
    return flag;
  }

  const fillRows = (table, mark1, mark2) => {
    let flag = false;
    const tempRow = table.find(row => {
      return findTwoSameInArr(row) === mark2;
    });
    if (tempRow) {
      tempRow.forEach(item => {
        if (!item.textContent) {
          item.textContent = mark1;
          flag = true;
        }
      });
    }
    return flag;
  }

  /*
  * 1. strategy === "win": Find out if there is a line already has two of my symbols, if exist, fill the empty spot to win and return true, otherwise return false
  * 2. strategy === "block": Find out if there is a line already has two of my opponent's symbols, if exist, fill the empty spot to block and return true, otherwise return false
  * @return {boolean}
  */
  const action = (strategy) => {
    //transpose the matrix
    const transposedTable = table[0].map((col, i) => table.map(row => row[i]));
    const diagonal = [[table[0][0], table[1][1], table[2][2]], [table[2][0], table[1][1], table[0][2]]];
    let flag = false;
    let opponentMark;

    if (strategy === "win") {
      opponentMark = mark;
    } else {
      if (mark === 'X') {
        opponentMark = 'O';
      } else {
        opponentMark = 'X';
      }
    }

    if (fillRows(table, mark, opponentMark)) {
      flag = true;
    } else if (fillRows(transposedTable, mark, opponentMark)) {
      flag = true;
    } else if (fillRows(diagonal, mark, opponentMark)) {
      flag = true;
    } else {

    }

    return flag;
  }

  const fillCorner = (mark) => {
    let flag = false;
    if (!table[0][0].textContent) {
      table[0][0].textContent = mark;
      flag = true;
    } else if (!table[0][2].textContent) {
      table[0][2].textContent = mark;
      flag = true;
    } else if (!table[2][0].textContent) {
      table[2][0].textContent = mark;
      flag = true;
    } else if (!table[2][2].textContent) {
      table[2][2].textContent = mark;
      flag = true;
    } else {

    }
    return flag;
  }

  if (!table[1][1].textContent) {
    table[1][1].textContent = mark;
  } else {
    if (action("win")) {

    } else if (action("block")) {

    } else if (fillCorner(mark)) {

    }else {
      easyBot(table, mark);
    }

  }
}
