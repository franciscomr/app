interface Format {
  readonly id:string
  readonly name:string
  readonly type:string
}

export class FormElement implements Format {
  id:string
  name:string
  type:string

  constructor(  id:string, name:string, type:string) {
    this.id = id
    this.name = name
    this.type = type
    this.ensureTypeIsValid(type);
  }

  private ensureTypeIsValid(value: string): void {
    const types = ['input', 'select', 'checkbox', 'radio', 'toggle']
    if(types.indexOf(value) < 0)   {
      throw new Error(`Input must be one of these types [${types}]`);
    }
  }
}