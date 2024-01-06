export default class getDates  {
  currentDate:any

  constructor() {
    this.currentDate = new Date();
   // this.currentDate = new Date(Date.now()).toLocaleString()
  }

  public today() {
    let todaysDate =  this.currentDate
    return this.formatDate(todaysDate)
  }

  public yesterday() {
    let yestardaysDate =  new Date(
      this.currentDate.getFullYear(),
      this.currentDate.getMonth(),
      this.currentDate.getDate() - 1,
    );
    return this.formatDate(yestardaysDate);
  }

  public lastweek() {
    let lastweeksDate =  new Date(
      this.currentDate.getFullYear(),
      this.currentDate.getMonth(),
      this.currentDate.getDate() - 7,
    );
    return this.formatDate(lastweeksDate)
  }

  public lastMonth() {
    let lastMonthsDate = new Date(
      this.currentDate.getFullYear(),
      this.currentDate.getMonth() - 1,
      this.currentDate.getDate(),
    );
    return this.formatDate(lastMonthsDate)
  }

  private  formatDate(date = new Date()) {
    const year = date.toLocaleString('default', {year: 'numeric'});
    const month = date.toLocaleString('default', {
      month: '2-digit',
    });
    const day = date.toLocaleString('default', {day: '2-digit'});
  
    return [year, month, day].join('-');
  }
  
}