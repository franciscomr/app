interface Format {
  readonly status:string
  readonly source:object
  readonly title:string
  readonly detail:object
}

export class Errors implements Format {
  status:string
  source:object
  title:string
  detail:object

  constructor(  status:string, source:object, title:string, detail:object) {
    this.status = status
    this.source = source
    this.title = title
    this.detail = detail
  }
}