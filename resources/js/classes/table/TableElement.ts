interface Format {
  readonly id:string
  readonly name:string
}

export class TableElement implements Format {
  id:string
  name:string

  constructor(  id:string, name:string) {
    this.id = id
    this.name = name
  }
}