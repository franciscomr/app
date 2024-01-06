import { FormElement } from "./FormElement"

export class FormElementInput extends FormElement {
  inputType: string;
  isRequired: boolean
  constructor(id:string, name:string, type:string, inputType:string, isRequired:boolean) {
    super(id,name,type);
    this.inputType = inputType;
    this.ensureTypeInputIsValid(inputType)
    this.isRequired = isRequired
    this.ensureRequiredIsBoolean(isRequired)
   }

   private ensureTypeInputIsValid(value: string): void {
    const inputs = ['text', 'password', 'date', 'time', 'email', 'number', 'search', 'hidden', 'file', 'color']
    if(inputs.indexOf(value) < 0)   {
      throw new Error(`Input type must be one of these types [${inputs}]`);
    }
  }

  private ensureRequiredIsBoolean(value:any): void {
    if (typeof value !== "boolean") {
      throw new Error(`${value} value must be Boolean`);

    }
  }
}